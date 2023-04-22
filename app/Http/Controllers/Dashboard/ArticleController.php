<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ArticleRequest;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    protected $articleRepo;
    protected $sectionRepo;

    public function __construct(ArticleRepositoryInterface $articleRepo, SectionRepositoryInterface $sectionRepo)
    {
        $this->articleRepo = $articleRepo;
        $this->sectionRepo = $sectionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'المقالات';

        $articles = $this->articleRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.articles.index', compact('pageTitle', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة مقال جديد';

        $sections = $this->sectionRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.articles.create', compact('pageTitle', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->except('_token', 'img');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('articles');
        }

        $this->articleRepo->create($data);

        return redirect()->route('dashboard.articles.index')->with('success', 'تمت الإضافة بنجاح');
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
        $article = $this->articleRepo->findOne($id);

        $pageTitle = 'تعديل المقالات';

        $sections = $this->sectionRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.articles.edit', compact('article', 'pageTitle', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = $this->articleRepo->findOne($id);

        $data = $request->except('_token', '_method', 'img');

        if ($request->hasFile('img')) {

            Storage::delete($article->img);

            $data['img'] = $request->file('img')->store('articles');
        } else {
            $data['img'] = $article->img;
        }

        $article->update($data);

        return redirect()->route('dashboard.articles.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepo->findOne($id);

        if ($article->img) {
            Storage::delete($article->img);
        }

        $article->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
