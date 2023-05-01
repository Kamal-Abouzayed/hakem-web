<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\BodySystemRepositoryInterface;
use App\Repositories\Contract\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $sectionRepo;
    protected $bodySystemRepo;

    public function __construct(SectionRepositoryInterface $sectionRepo, BodySystemRepositoryInterface $bodySystemRepo)
    {
        $this->sectionRepo = $sectionRepo;
        $this->bodySystemRepo = $bodySystemRepo;
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
}
