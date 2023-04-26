<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdviceRequest;
use App\Repositories\Contract\AdviceRepositoryInterface;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;

class AdviceController extends Controller
{
    protected $sectionRepo;
    protected $adviceRepo;

    public function __construct(SectionRepositoryInterface $sectionRepo, AdviceRepositoryInterface $adviceRepo)
    {
        $this->sectionRepo = $sectionRepo;
        $this->adviceRepo  = $adviceRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sectionSlug)
    {

        $pageTitle = 'النصائح';

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $advices = $this->adviceRepo->getWhere([['section_id', $section->id]]);

        return view('dashboard.advices.index', compact('pageTitle', 'advices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sectionSlug)
    {
        $pageTitle = 'إضافة قسم جديد';

        return view('dashboard.advices.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdviceRequest $request, $sectionSlug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $data = $request->except('_token');

        $section->advices()->create($data);

        return redirect()->route('dashboard.advices.index', $sectionSlug)->with('success', 'تمت الإضافة بنجاح');
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
    public function edit($sectionSlug, $id)
    {
        $pageTitle = 'تعديل النصائح';

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $advice = $this->adviceRepo->findwhere([['section_id', $section->id], ['id', $id]]);

        return view('dashboard.advices.edit', compact('pageTitle', 'advice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdviceRequest $request, $sectionSlug, $id)
    {

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $advice = $this->adviceRepo->findwhere([['section_id', $section->id], ['id', $id]]);

        $data = $request->except('_token', '_method', 'img');

        if ($request->hasFile('img')) {

            Storage::delete($advice->img);

            $data['img'] = $request->file('img')->store('advices');
        } else {
            $data['img'] = $advice->img;
        }

        $advice->update($data);

        return redirect()->route('dashboard.advices.index', $sectionSlug)->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sectionSlug, $id)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $advice = $this->adviceRepo->findwhere([['section_id', $section->id], ['id', $id]]);

        if ($advice->img) {
            Storage::delete($advice->img);
        }

        $advice->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
