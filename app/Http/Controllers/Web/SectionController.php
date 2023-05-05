<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\BodySystemRepositoryInterface;
use App\Repositories\Contract\CategoryRepositoryInterface;
use App\Repositories\Contract\PregnancyStageRepositoryInterface;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $sectionRepo;
    protected $bodySystemRepo;
    protected $categoryRepo;
    protected $articleRepo;
    protected $stageRepo;

    public function __construct(
        SectionRepositoryInterface $sectionRepo,
        BodySystemRepositoryInterface $bodySystemRepo,
        CategoryRepositoryInterface $categoryRepo,
        ArticleRepositoryInterface $articleRepo,
        PregnancyStageRepositoryInterface $stageRepo
    ) {
        $this->sectionRepo    = $sectionRepo;
        $this->bodySystemRepo = $bodySystemRepo;
        $this->categoryRepo   = $categoryRepo;
        $this->articleRepo    = $articleRepo;
        $this->stageRepo      = $stageRepo;
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

        $pageTitle = $article->name;

        $share = \Share::currentPage($article->name)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();

        return view('web.article-details', compact('pageTitle', 'section', 'article', 'share'));
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
}
