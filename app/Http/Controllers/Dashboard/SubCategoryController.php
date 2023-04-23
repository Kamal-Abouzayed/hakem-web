<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\CategoryRepositoryInterface;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    protected $sectionRepo;
    protected $catRepo;

    public function __construct(CategoryRepositoryInterface $catRepo, SectionRepositoryInterface $sectionRepo)
    {
        $this->catRepo = $catRepo;
        $this->sectionRepo = $sectionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sectionSlug)
    {

        $pageTitle = 'الأقسام الفرعية';

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $categories = $this->catRepo->getWhere([['section_id', $section->id], ['parent_id', '!=', null]]);

        return view('dashboard.sub-categories.index', compact('pageTitle', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sectionSlug)
    {
        $pageTitle = 'إضافة قسم جديد';

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $categories = $this->catRepo->getWhere([['section_id', $section->id], ['parent_id', null]]);

        return view('dashboard.sub-categories.create', compact('pageTitle', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sectionSlug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $parent = $this->catRepo->findOne($request->parent_id);

        $data = $request->except('_token', 'img');

        $data['section_id'] = $section->id;

        // dd($data);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('sections');
        }

        $parent->children()->create($data);

        return redirect()->route('dashboard.sub-categories.index', $sectionSlug)->with('success', 'تمت الإضافة بنجاح');
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
    public function edit($sectionSlug, $slug)
    {
        $pageTitle = 'تعديل القسم';

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $categories = $this->catRepo->getWhere([['section_id', $section->id], ['parent_id', null]]);

        $category = $this->catRepo->findwhere([['slug', $slug]]);

        return view('dashboard.sub-categories.edit', compact('pageTitle', 'categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sectionSlug, $slug)
    {
        // $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $category = $this->catRepo->findwhere([['slug', $slug]]);

        $data = $request->except('_token', '_method', 'img');

        if ($request->hasFile('img')) {

            Storage::delete($category->img);

            $data['img'] = $request->file('img')->store('categories');
        } else {
            $data['img'] = $category->img;
        }

        $category->update($data);

        return redirect()->route('dashboard.sub-categories.index', $sectionSlug)->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sectionSlug, $slug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $category = $this->catRepo->findwhere([['section_id', $section->id], ['slug', $slug]]);

        if ($category->img) {
            Storage::delete($category->img);
        }

        $category->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
