<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $pageTitle = 'المستخدمين';

        $users = User::all();

        return view('dashboard.users.index', compact('users', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'إضافة مستخدم جديد';

        return view('dashboard.users.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        User::create($data);

        return redirect(route('dashboard.users.index'))->with('success', 'تمت الإضافة بنجاح');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->except('_token', '_method');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);

        return redirect(route('dashboard.users.index'))->with('success', 'User Updated Successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
