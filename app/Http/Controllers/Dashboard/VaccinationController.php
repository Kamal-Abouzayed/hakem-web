<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VaccinationRequest;
use App\Models\ArticleVaccination;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\VaccinationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VaccinationController extends Controller
{
    protected $articleRepo;
    protected $vaccinationRepo;

    public function __construct(
        ArticleRepositoryInterface $articleRepo,
        VaccinationRepositoryInterface $vaccinationRepo
    ) {
        $this->articleRepo = $articleRepo;
        $this->vaccinationRepo = $vaccinationRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'التطعيمات';

        $vaccinations = $this->vaccinationRepo->getAll();

        return view('dashboard.vaccinations.index', compact('pageTitle', 'vaccinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة تطعيم جديد';

        $articles = $this->articleRepo->getAll();

        return view('dashboard.vaccinations.create', compact('pageTitle', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VaccinationRequest $request)
    {

        $data = $request->except('_token', 'img', 'article_id');

        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('vaccinations');
        }

        // dd($data);
        $vaccination =  $this->vaccinationRepo->create($data);

        if ($request->article_id) {
            foreach ($request->article_id as $key => $article) {
                ArticleVaccination::create([
                    'vaccination_id'  => $vaccination->id,
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

        return redirect()->route('dashboard.vaccinations.index')->with('success', 'تمت الإضافة بنجاح');
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
        $vaccination = $this->vaccinationRepo->findWhere([['slug', $slug]]);

        $pageTitle = 'تعديل الفحوصات';

        $articles = $this->articleRepo->getAll();

        return view('dashboard.vaccinations.edit', compact('articles', 'pageTitle', 'vaccination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VaccinationRequest $request, $slug)
    {
        $vaccination = $this->vaccinationRepo->findWhere([['slug', $slug]]);

        $data = $request->except('_token', '_method', 'img', 'article_id');

        if ($request->hasFile('img')) {

            Storage::delete($vaccination->img);

            $data['img'] = $request->file('img')->store('vaccinations');
        } else {
            $data['img'] = $vaccination->img;
        }

        $vaccination->update($data);

        if ($request->article_id) {

            ArticleVaccination::where('vaccination_id', $vaccination->id)->get()->each->delete();

            foreach ($request->article_id as $key => $article) {
                ArticleVaccination::create([
                    'vaccination_id'  => $vaccination->id,
                    'article_id' => $article,
                ]);
            }
        }


        return redirect()->route('dashboard.vaccinations.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $vaccination = $this->vaccinationRepo->findWhere([['slug', $slug]]);

        if ($vaccination->img) {
            Storage::delete($vaccination->img);
        }

        $vaccination->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
