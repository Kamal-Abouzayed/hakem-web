<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    protected $sectionRepo;

    public function __construct(SectionRepositoryInterface $sectionRepo)
    {
        $this->sectionRepo = $sectionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'الأقسام الرئيسية';

        $sections = $this->sectionRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.sections.index', compact('pageTitle', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة قسم جديد';

        return view('dashboard.sections.create', compact('pageTitle'));
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

        $this->sectionRepo->create($data);

        return redirect()->route('dashboard.sections.index')->with('success', 'تمت الإضافة بنجاح');
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
        $pageTitle = 'تعديل القسم';

        $section = $this->sectionRepo->findOne($id);

        return view('dashboard.sections.edit', compact('pageTitle', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $section = $this->sectionRepo->findOne($id);

        $data = $request->except('_token', '_method', 'img');

        if ($request->hasFile('img')) {

            Storage::delete($section->img);

            $data['img'] = $request->file('img')->store('sections');
        } else {
            $data['img'] = $section->img;
        }

        $section->update($data);

        return redirect()->route('dashboard.sections.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = $this->sectionRepo->findOne($id);

        if ($section->img) {
            Storage::delete($section->img);
        }

        $section->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
