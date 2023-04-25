<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\OrganRequest;
use App\Repositories\Contract\BodySystemRepositoryInterface;
use App\Repositories\Contract\OrganRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganController extends Controller
{
    protected $organRepo;
    protected $bodySystemRepo;

    public function __construct(OrganRepositoryInterface $organRepo, BodySystemRepositoryInterface $bodySystemRepo)
    {
        $this->organRepo = $organRepo;
        $this->bodySystemRepo = $bodySystemRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'أعضاء الجسم';

        $organs = $this->organRepo->getAll();

        return view('dashboard.organs.index', compact('pageTitle', 'organs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة عضو جديد';

        $bodySystems = $this->bodySystemRepo->getAll();

        return view('dashboard.organs.create', compact('pageTitle', 'bodySystems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganRequest $request)
    {

        $data = $request->except('_token', 'img');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('organs');
        }

        $this->organRepo->create($data);

        return redirect()->route('dashboard.organs.index')->with('success', 'تمت الإضافة بنجاح');
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
        $organ = $this->organRepo->findWhere([['slug', $slug]]);

        $pageTitle = 'تعديل أعضاء الجسم';

        $bodySystems = $this->bodySystemRepo->getAll();

        return view('dashboard.organs.edit', compact('organ', 'pageTitle', 'bodySystems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganRequest $request, $slug)
    {
        $organ = $this->organRepo->findWhere([['slug', $slug]]);

        $data = $request->except('_token', '_method', 'img');

        if ($request->hasFile('img')) {

            Storage::delete($organ->img);

            $data['img'] = $request->file('img')->store('organs');
        } else {
            $data['img'] = $organ->img;
        }

        $organ->update($data);

        return redirect()->route('dashboard.organs.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $organ = $this->organRepo->findWhere([['slug', $slug]]);

        if ($organ->img) {
            Storage::delete($organ->img);
        }

        $organ->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
