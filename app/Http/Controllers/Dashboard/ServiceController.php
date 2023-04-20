<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ServiceRequest;
use App\Repositories\Contract\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceRepo;

    public function __construct(ServiceRepositoryInterface $serviceRepo)
    {
        $this->serviceRepo = $serviceRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'الخدمات';

        $services = $this->serviceRepo->getAll();

        return view('dashboard.services.index', compact('pageTitle', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة خدمة جديد';

        return view('dashboard.services.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services');
        }

        $this->serviceRepo->create($data);

        return redirect()->route('dashboard.services.index')->with('success', 'تمت الإضافة بنجاح');
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
        $pageTitle = 'تعديل الخدمات';

        $service = $this->serviceRepo->findOne($id);

        if ($service) {
            return view('dashboard.services.edit', compact('service', 'pageTitle'));
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
    public function update(ServiceRequest $request, $id)
    {
        $service = $this->serviceRepo->findOne($id);

        $data = $request->except('_method');

        if ($request->hasFile('image')) {

            Storage::delete($service->image);

            $data['image'] = $request->file('image')->store('services');
        } else {
            $data['image'] = $service->image;
        }

        $service->update($data);

        return redirect()->route('dashboard.services.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = $this->serviceRepo->findOne($id);

        $service->delete();

        return response()->json([
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
