<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GoalRequest;
use App\Repositories\Contract\GoalRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoalController extends Controller
{

    protected $goalRepo;

    public function __construct(GoalRepositoryInterface $goalRepo)
    {
        $this->goalRepo = $goalRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'الأهداف';

        $goals = $this->goalRepo->getAll();

        return view('dashboard.goals.index', compact('pageTitle', 'goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة هدف جديد';

        return view('dashboard.goals.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('goals');
        }

        $this->goalRepo->create($data);

        return redirect()->route('dashboard.goals.index')->with('success', 'تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'تعديل الأهداف';

        $goal = $this->goalRepo->findOne($id);

        if ($goal) {
            return view('dashboard.goals.edit', compact('goal', 'pageTitle'));
        } else {
            return view('errors.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoalRequest $request, $id)
    {
        $goal = $this->goalRepo->findOne($id);

        $data = $request->except('_method');

        if ($request->hasFile('image')) {

            Storage::delete($goal->image);

            $data['image'] = $request->file('image')->store('goals');
        } else {
            $data['image'] = $goal->image;
        }

        $goal->update($data);

        return redirect()->route('dashboard.goals.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goal = $this->goalRepo->findOne($id);

        $goal->delete();

        return response()->json([
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
