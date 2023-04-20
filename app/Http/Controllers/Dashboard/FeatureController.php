<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FeatureRequest;
use App\Repositories\Contract\FeatureRepositoryInterface;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    protected $featureRepo;

    public function __construct(FeatureRepositoryInterface $featureRepo)
    {
        $this->featureRepo = $featureRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'المميزات';

        $features = $this->featureRepo->getAll();

        return view('dashboard.features.index', compact('pageTitle', 'features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة ميزة جديد';

        return view('dashboard.features.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('features');
        }

        $this->featureRepo->create($data);

        return redirect()->route('dashboard.features.index')->with('success', 'تمت الإضافة بنجاح');
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
        $pageTitle = 'تعديل المميزات';

        $feature = $this->featureRepo->findOne($id);

        if ($feature) {
            return view('dashboard.features.edit', compact('feature', 'pageTitle'));
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
    public function update(FeatureRequest $request, $id)
    {
        $feature = $this->featureRepo->findOne($id);

        $data = $request->except('_method');

        if ($request->hasFile('image')) {

            Storage::delete($feature->image);

            $data['image'] = $request->file('image')->store('features');
        } else {
            $data['image'] = $feature->image;
        }

        $feature->update($data);

        return redirect()->route('dashboard.features.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = $this->featureRepo->findOne($id);

        $feature->delete();

        return response()->json([
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
