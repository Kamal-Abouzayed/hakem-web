<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\BodySystemRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BodySystemController extends Controller
{
    protected $bodySystemRepo;

    public function __construct(BodySystemRepositoryInterface $bodySystemRepo)
    {
        $this->bodySystemRepo = $bodySystemRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'أجهزة جسم الإنسان';

        $bodySystems = $this->bodySystemRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.body-systems.index', compact('pageTitle', 'bodySystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة قسم جديد';

        return view('dashboard.body-systems.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', 'img');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('sections');
        }

        $this->bodySystemRepo->create($data);

        return redirect()->route('dashboard.body-systems.index')->with('success', 'تمت الإضافة بنجاح');
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

        $bodySystem = $this->bodySystemRepo->findWhere([['slug', $slug]]);

        return view('dashboard.body-systems.edit', compact('pageTitle', 'bodySystem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $bodySystem = $this->bodySystemRepo->findWhere([['slug', $slug]]);

        $data = $request->except('_token', '_method', 'img');

        if ($request->hasFile('img')) {

            Storage::delete($bodySystem->img);

            $data['img'] = $request->file('img')->store('body-systems');
        } else {
            $data['img'] = $bodySystem->img;
        }

        $bodySystem->update($data);

        return redirect()->route('dashboard.body-systems.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sectionSlug, $slug)
    {
        $section = $this->bodySystemRepo->findWhere([['slug', $sectionSlug]]);

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
