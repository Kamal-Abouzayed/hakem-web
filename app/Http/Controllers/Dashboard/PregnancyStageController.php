<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PregnancyStageRequest;
use App\Repositories\Contract\PregnancyStageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PregnancyStageController extends Controller
{
    protected $pregnancyStageRepo;

    public function __construct(PregnancyStageRepositoryInterface $pregnancyStageRepo)
    {
        $this->pregnancyStageRepo = $pregnancyStageRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'مراحل الحمل';

        $stages = $this->pregnancyStageRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.pregnancy-stages.index', compact('pageTitle', 'stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة قسم جديد';

        return view('dashboard.pregnancy-stages.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PregnancyStageRequest $request)
    {
        $data = $request->except('_token', 'img');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('pregnancy-stages');
        }

        $this->pregnancyStageRepo->create($data);

        return redirect()->route('dashboard.pregnancy-stages.index')->with('success', 'تمت الإضافة بنجاح');
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
    public function edit($slug)
    {
        $pageTitle = 'تعديل القسم';

        $stage = $this->pregnancyStageRepo->findwhere([['slug', $slug]]);

        $parentStages = $this->pregnancyStageRepo->getWhere([['parent_id', null]]);

        return view('dashboard.pregnancy-stages.edit', compact('pageTitle', 'stage', 'parentStages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PregnancyStageRequest $request, $slug)
    {

        $stage =  $this->pregnancyStageRepo->findwhere([['slug', $slug]]);

        $data = $request->except('_token', '_method', 'img');

        if ($request->hasFile('img')) {

            Storage::delete($stage->img);

            $data['img'] = $request->file('img')->store('pregnancy-stages');
        } else {
            $data['img'] = $stage->img;
        }

        $stage->update($data);

        return redirect()->route('dashboard.pregnancy-stages.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $stage =  $this->pregnancyStageRepo->findwhere([['slug', $slug]]);

        if ($stage->img) {
            Storage::delete($stage->img);
        }

        $stage->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
