<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ArticleRequest;
use App\Mail\ArticleMail;
use App\Models\DiseaseMedicine;
use App\Models\DiseaseOrgan;
use App\Models\User;
use App\Notifications\ArticleNotification;
use App\Notifications\ArticleNotify;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\CategoryRepositoryInterface;
use App\Repositories\Contract\OrganRepositoryInterface;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    protected $articleRepo;
    protected $sectionRepo;
    protected $catRepo;
    protected $organRepo;

    public function __construct(
        ArticleRepositoryInterface $articleRepo,
        SectionRepositoryInterface $sectionRepo,
        CategoryRepositoryInterface $catRepo,
        OrganRepositoryInterface $organRepo
    ) {
        $this->articleRepo = $articleRepo;
        $this->sectionRepo = $sectionRepo;
        $this->catRepo     = $catRepo;
        $this->organRepo   = $organRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sectionSlug)
    {
        $pageTitle = 'المقالات';

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $articles = $this->articleRepo->getWhere([['section_id', $section->id]]);

        return view('dashboard.articles.index', compact('pageTitle', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sectionSlug)
    {
        $pageTitle = 'إضافة مقال جديد';

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $categories = $this->catRepo->getWhere([['section_id', $section->id]]);

        $medicines = $this->articleRepo->getWhere([['section_id', 5]]);

        $organs = $this->organRepo->getAll();

        return view('dashboard.articles.create', compact('pageTitle', 'categories', 'medicines', 'organs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, $sectionSlug)
    {

        $user = auth()->user();

        $data = $request->except('_token', 'img', 'medicine_id');

        $data['user_id'] = $user->id;

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $data['section_id'] = $section->id;

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('articles');
        }

        // dd($data);
        $article =  $this->articleRepo->create($data);

        if ($request->medicine_id) {
            foreach ($request->medicine_id as $key => $medicine) {
                DiseaseMedicine::create([
                    'disease_id'  => $article->id,
                    'medicine_id' => $medicine,
                ]);
            }
        }

        if ($request->organ_id) {
            foreach ($request->organ_id as $key => $organ) {
                DiseaseOrgan::create([
                    'disease_id'  => $article->id,
                    'organ_id' => $organ,
                ]);
            }
        }

        return redirect()->route('dashboard.articles.index', $sectionSlug)->with('success', 'تمت الإضافة بنجاح');
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
        $article = $this->articleRepo->findWhere([['slug', $slug]]);

        $pageTitle = 'تعديل المقالات';

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $categories = $this->catRepo->getWhere([['section_id', $section->id]]);

        $medicines = $this->articleRepo->getWhere([['section_id', 5]]);

        $organs = $this->organRepo->getAll();

        return view('dashboard.articles.edit', compact('article', 'pageTitle', 'categories', 'medicines', 'organs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $sectionSlug, $slug)
    {
        $article = $this->articleRepo->findWhere([['slug', $slug]]);

        $data = $request->except('_token', '_method', 'img', 'medicine_id');

        if ($request->hasFile('img')) {

            Storage::delete($article->img);

            $data['img'] = $request->file('img')->store('articles');
        } else {
            $data['img'] = $article->img;
        }

        $article->update($data);


        if ($request->medicine_id) {

            DiseaseMedicine::where('disease_id', $article->id)->get()->each->delete();

            foreach ($request->medicine_id as $key => $medicine) {
                DiseaseMedicine::create([
                    'disease_id'  => $article->id,
                    'medicine_id' => $medicine,
                ]);
                // dd('ss');
            }
        }

        if ($request->organ_id) {

            DiseaseOrgan::where('disease_id', $article->id)->get()->each->delete();

            foreach ($request->organ_id as $key => $organ) {
                DiseaseOrgan::create([
                    'disease_id'  => $article->id,
                    'organ_id' => $organ,
                ]);
            }
        }


        return redirect()->route('dashboard.articles.index', $sectionSlug)->with('success', 'تم التعديل بنجاح');
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

        $article = $this->articleRepo->findWhere([['section_id', $section->id], ['slug', $slug]]);

        if ($article->img) {
            Storage::delete($article->img);
        }

        $article->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
