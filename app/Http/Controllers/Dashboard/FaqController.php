<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FaqRequest;
use App\Repositories\Contract\FaqRepositoryInterface;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faqRepo;

    public function __construct(FaqRepositoryInterface $faqRepo)
    {
        $this->faqRepo = $faqRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'الأسئلة الشائعة';

        $faqs = $this->faqRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.faqs.index', compact('faqs', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة سؤال جديد';

        return view('dashboard.faqs.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $data = $request->except('_token');

        $this->faqRepo->create($data);

        return redirect()->route('dashboard.faqs.index')->with('success', 'تمت الإضافة بنجاح');
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
        $pageTitle = 'تعديل الإعلان';

        $faq = $this->faqRepo->findWhere([['slug', $slug]]);

        return view('dashboard.faqs.edit', compact('pageTitle', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, $slug)
    {
        $faq = $this->faqRepo->findWhere([['slug', $slug]]);

        $data = $request->except('_token', '_method');

        $faq->update($data);

        return redirect()->route('dashboard.faqs.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $faq = $this->faqRepo->findWhere([['slug', $slug]]);

        $faq->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
