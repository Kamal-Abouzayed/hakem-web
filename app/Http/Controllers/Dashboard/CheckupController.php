<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CheckupRequest;
use App\Models\ArticleCheckup;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\CheckupRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CheckupController extends Controller
{
    protected $articleRepo;
    protected $checkupRepo;

    public function __construct(
        ArticleRepositoryInterface $articleRepo,
        CheckupRepositoryInterface $checkupRepo
    ) {
        $this->articleRepo = $articleRepo;
        $this->checkupRepo = $checkupRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'الفحوصات';

        $checkups = $this->checkupRepo->getAll();

        return view('dashboard.checkups.index', compact('pageTitle', 'checkups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة فحص جديد';

        $articles = $this->articleRepo->getAll();

        return view('dashboard.checkups.create', compact('pageTitle', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckupRequest $request)
    {
        // dd($request->category_id);

        $data = $request->except('_token', 'img', 'article_id');

        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('checkups');
        }

        // dd($data);
        $checkup =  $this->checkupRepo->create($data);

        if ($request->article_id) {
            foreach ($request->article_id as $key => $article) {
                ArticleCheckup::create([
                    'checkup_id'  => $checkup->id,
                    'article_id' => $article,
                ]);
            }
        }

        // $users = User::where('isActive', 1)->get();


        // foreach ($users as $key => $user) {

        //     $data = [
        //         'username' => $user->fname . ' ' . $user->lname,
        //         'article'  => $article->name,
        //         'link'     => url($section->slug . '/article-details/' . $article->slug),
        //         'msg'      => __('New Article From Hakem Web')
        //     ];

        //     Mail::to($user->email)->send(new ArticleMail($data));
        // }

        return redirect()->route('dashboard.checkups.index')->with('success', 'تمت الإضافة بنجاح');
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
        $checkup = $this->checkupRepo->findWhere([['slug', $slug]]);

        $pageTitle = 'تعديل الفحوصات';

        $articles = $this->articleRepo->getAll();

        return view('dashboard.checkups.edit', compact('articles', 'pageTitle', 'checkup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckupRequest $request, $slug)
    {
        $checkup = $this->checkupRepo->findWhere([['slug', $slug]]);

        $data = $request->except('_token', '_method', 'img', 'article_id');

        if ($request->hasFile('img')) {

            Storage::delete($checkup->img);

            $data['img'] = $request->file('img')->store('checkups');
        } else {
            $data['img'] = $checkup->img;
        }

        $checkup->update($data);

        if ($request->article_id) {

            ArticleCheckup::where('checkup_id', $checkup->id)->get()->each->delete();

            foreach ($request->article_id as $key => $article) {
                ArticleCheckup::create([
                    'checkup_id'  => $checkup->id,
                    'article_id' => $article,
                ]);
            }
        }


        return redirect()->route('dashboard.checkups.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $checkup = $this->checkupRepo->findWhere([['slug', $slug]]);

        if ($checkup->img) {
            Storage::delete($checkup->img);
        }

        $checkup->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
