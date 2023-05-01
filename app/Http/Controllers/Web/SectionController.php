<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\BodySystemRepositoryInterface;
use App\Repositories\Contract\CategoryRepositoryInterface;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $sectionRepo;
    protected $bodySystemRepo;
    protected $categoryRepo;
    protected $articleRepo;

    public function __construct(
        SectionRepositoryInterface $sectionRepo,
        BodySystemRepositoryInterface $bodySystemRepo,
        CategoryRepositoryInterface $categoryRepo,
        ArticleRepositoryInterface $articleRepo
    ) {
        $this->sectionRepo    = $sectionRepo;
        $this->bodySystemRepo = $bodySystemRepo;
        $this->categoryRepo   = $categoryRepo;
        $this->articleRepo    = $articleRepo;
    }

    public function index($sectionSlug)
    {
        $section = $this->sectionRepo->findWhere([['slug', $sectionSlug]]);

        $pageTitle = $section->name;

        $categories = $section->categories;

        $bodySystems = $this->bodySystemRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        $bodySystemsChunks = $bodySystems->chunk(6);

        return view('web.section', compact('categories', 'pageTitle', 'section', 'bodySystems', 'bodySystemsChunks'));
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

        return view('web.article-details', compact('pageTitle', 'section', 'article'));
    }
}