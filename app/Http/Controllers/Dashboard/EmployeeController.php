<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $pageTitle = 'الموظفين';

        $employees = $this->userRepo->whereRole('employee');

        return view('dashboard.employees.index', compact('employees', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'إضافة موظف جديد';

        $permissions = Permission::get();

        return view('dashboard.employees.create', compact('permissions', 'pageTitle'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', 'permissions');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user = $this->userRepo->create($data);

        $user->assignRole('employee');

        $user->givePermissionTo($request->permissions);

        return redirect()->route('dashboard.employees.index')->with('success', 'تم إضافة الموظف بنجاح');
    }

    public function edit($id)
    {
        $pageTitle = 'تعديل موظف';

        $user = $this->userRepo->findOne($id);

        $permissions = Permission::get();

        return view('dashboard.employees.edit', compact('permissions', 'pageTitle', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepo->findOne($id);

        $data = $request->except('_token', '_method', 'permissions');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }

        if ($request->permissions) {
            $user->syncPermissions($request->permissions);
        }

        $user->update($data);

        return redirect()->route('dashboard.employees.index')->with('success', 'تم تعديل بيانات الموظف بنجاح');
    }

    public function destroy($id)
    {
        $user = $this->userRepo->findOne($id);

        $user->delete();

        return response()->json([
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
