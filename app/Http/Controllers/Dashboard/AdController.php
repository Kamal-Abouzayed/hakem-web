<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdRequest;
use App\Repositories\Contract\AdRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    protected $adRepo;

    public function __construct(AdRepositoryInterface $adRepo)
    {
        $this->adRepo = $adRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'الإعلانات';

        $ads = $this->adRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.ads.index', compact('ads', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة إعلان جديد';

        return view('dashboard.ads.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request)
    {
        $data = $request->except('_token', 'img');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('ads');
        }

        $this->adRepo->create($data);

        return redirect()->route('dashboard.ads.index')->with('success', 'تمت الإضافة بنجاح');
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
        $pageTitle = 'تعديل الإعلان';

        $ad = $this->adRepo->findOne($id);

        return view('dashboard.ads.edit', compact('pageTitle', 'ad'));
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
        $ad = $this->adRepo->findOne($id);

        $data = $request->except('_token', '_method', 'img');

        if ($request->hasFile('img')) {

            Storage::delete($ad->img);

            $data['img'] = $request->file('img')->store('ads');
        } else {
            $data['img'] = $ad->img;
        }

        $ad->update($data);

        return redirect()->route('dashboard.ads.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = $this->adRepo->findOne($id);

        if ($ad->img) {
            Storage::delete($ad->img);
        }

        $ad->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
