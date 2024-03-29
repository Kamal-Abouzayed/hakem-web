<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Checkup;
use App\Models\Vaccination;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\BodySystemRepositoryInterface;
use App\Repositories\Contract\CategoryRepositoryInterface;
use App\Repositories\Contract\OrganRepositoryInterface;
use App\Repositories\Contract\PregnancyStageRepositoryInterface;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    protected $sectionRepo;
    protected $bodySystemRepo;
    protected $categoryRepo;
    protected $articleRepo;
    protected $stageRepo;
    protected $organRepo;

    public function __construct(
        SectionRepositoryInterface $sectionRepo,
        BodySystemRepositoryInterface $bodySystemRepo,
        CategoryRepositoryInterface $categoryRepo,
        ArticleRepositoryInterface $articleRepo,
        PregnancyStageRepositoryInterface $stageRepo,
        OrganRepositoryInterface $organRepo
    ) {
        $this->sectionRepo    = $sectionRepo;
        $this->bodySystemRepo = $bodySystemRepo;
        $this->categoryRepo   = $categoryRepo;
        $this->articleRepo    = $articleRepo;
        $this->stageRepo      = $stageRepo;
        $this->organRepo      = $organRepo;
    }

    public function index($sectionSlug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $pageTitle = $section->name;

        $categories = $section->categories;

        $bodySystems = $this->bodySystemRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        $bodySystemsChunks = $bodySystems->chunk(6);

        $pregnancyStages = $this->stageRepo->getWhere([['parent_id', null]], ['column' => 'id', 'dir' => 'ASC']);

        return view('web.section', compact('categories', 'pageTitle', 'section', 'bodySystems', 'bodySystemsChunks', 'pregnancyStages'));
    }

    public function bodySystem($sectionSlug, $bodySystemSlug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $pageTitle = $section->name;

        $categories = $section->categories;

        $bodySystem = $this->bodySystemRepo->findWhere([['slug', $bodySystemSlug]]);

        return view('web.body-system', compact('pageTitle', 'section', 'bodySystem'));
    }

    public function categoryDetails($sectionSlug, $slug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $category = $this->categoryRepo->findWhere([['slug', $slug]]);

        $pageTitle = $category->name;

        return view('web.category-details', compact('pageTitle', 'section', 'category'));
    }

    public function articleDetails($sectionSlug, $slug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $article = $this->articleRepo->findWhere([['slug', $slug], ['section_id', $section->id]]);

        if ($article) {
            $pageTitle = $article->name;

            $view_key = 'article_' . $article->slug;
            // Check if blog session key exists
            // If not, update view_count and create session key
            if (!Session::has($view_key)) {
                $article->views += 1;
                $article->save();
                Session::put($view_key, 1);
            }

            $share = \Share::currentPage($article->name)
                ->facebook()
                ->twitter()
                ->linkedin()
                ->whatsapp();


            return view('web.article-details', compact('pageTitle', 'section', 'article', 'share'));
        } else {
            return redirect()->route('web.home');
        }
    }

    public function pregnancyStage($sectionSlug, $slug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $stage = $this->stageRepo->findWhere([['slug', $slug]]);

        $pageTitle = $stage->name;

        $share = \Share::currentPage($stage->name)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();

        return view('web.pregnancy-stage-details', compact('pageTitle', 'section', 'stage', 'share'));
    }

    public function searchDiseases(Request $request, $sectionSlug)
    {
        $pageTitle = __('Search Results');

        $searchTerm = $request->searchTerm;

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $articles = Article::query()->where(function ($q) use ($searchTerm) {
            $q->where('name_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('name_en', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_en', 'LIKE', "%{$searchTerm}%");
        })->where('section_id', $section->id)->get();

        return view('web.search-diseases', compact('pageTitle', 'articles'));
    }

    public function searchCalories(Request $request, $sectionSlug)
    {
        $pageTitle = __('Search Results');

        $searchTerm = $request->searchTerm;

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $articles = Article::query()->where(function ($q) use ($searchTerm) {
            $q->where('name_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('name_en', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_en', 'LIKE', "%{$searchTerm}%");
        })->where('section_id', $section->id)->get();

        return view('web.search-calories', compact('pageTitle', 'articles'));
    }

    public function organDetails($sectionSlug, $slug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $article = $this->organRepo->findWhere([['slug', $slug]]);

        $pageTitle = $article->name;

        $share = \Share::currentPage($article->name)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();

        return view('web.organ-details', compact('pageTitle', 'section', 'article', 'share'));
    }

    public function searchDiseasesByLetter(Request $request, $sectionSlug)
    {
        $pageTitle = __('Search Results');

        $searchTerm = $request->search_character;

        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $articles = Article::query()->where(function ($q) use ($searchTerm) {
            $q->where('name_ar', 'LIKE', $searchTerm . '%')
                ->orWhere('name_en', 'LIKE', $searchTerm . '%');
        })->where('section_id', $section->id)->get();

        return view('web.search-diseases', compact('pageTitle', 'articles'));
    }

    public function searchCheckups(Request $request)
    {
        $pageTitle = __('Search Results');

        $searchTerm = $request->searchTerm;

        $articles = Checkup::query()->where(function ($q) use ($searchTerm) {
            $q->where('name_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('name_en', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_en', 'LIKE', "%{$searchTerm}%");
        })->get();

        return view('web.search-checkups', compact('pageTitle', 'articles'));
    }

    public function searchVaccinations(Request $request)
    {
        $pageTitle = __('Search Results');

        $searchTerm = $request->searchTerm;

        $articles = Vaccination::query()->where(function ($q) use ($searchTerm) {
            $q->where('name_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('name_en', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_en', 'LIKE', "%{$searchTerm}%");
        })->get();

        return view('web.search-vaccinations', compact('pageTitle', 'articles'));
    }
}
