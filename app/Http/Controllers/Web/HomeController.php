<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Visitor;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\CheckupRepositoryInterface;
use App\Repositories\Contract\ProductRepositoryInterface;
use App\Repositories\Contract\VaccinationRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $articleRepo;
    protected $checkupRepo;
    protected $vaccinationRepo;

    public function __construct(
        ArticleRepositoryInterface $articleRepo,
        CheckupRepositoryInterface $checkupRepo,
        VaccinationRepositoryInterface $vaccinationRepo
    ) {
        $this->articleRepo     = $articleRepo;
        $this->checkupRepo     = $checkupRepo;
        $this->vaccinationRepo = $vaccinationRepo;
    }

    public function index(Request $request)
    {

        $ip = hash('sha512', $request->ip());

        if (Visitor::where('ip', $ip)->count() < 1) {
            Visitor::create([
                'ip' => $ip,
            ]);
        }

        $pageTitle = __('Home');

        $articles = $this->articleRepo->limit(12);

        return view('web.home', compact('articles', 'pageTitle'));
    }

    public function searchArticles(Request $request)
    {
        $pageTitle = __('Search Results');

        $searchTerm = $request->searchTerm;

        $articles = Article::query()->where(function ($q) use ($searchTerm) {
            $q->where('name_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('name_en', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_ar', 'LIKE', "%{$searchTerm}%")
                ->orWhere('desc_en', 'LIKE', "%{$searchTerm}%");
        })->get();

        return view('web.search-articles', compact('pageTitle', 'articles'));
    }

    public function checkups()
    {
        $pageTitle = __('Checkups');

        $articles = $this->checkupRepo->getAll();

        return view('web.checkups', compact('pageTitle', 'articles'));
    }

    public function checkupDetails($slug)
    {
        $article = $this->checkupRepo->findWhere([['slug', $slug]]);

        $pageTitle = $article->name;

        $share = \Share::currentPage($article->name)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();

        return view('web.checkup-details', compact('pageTitle', 'article', 'share'));
    }

    public function vaccinations()
    {
        $pageTitle = __('Vaccinations');

        $vaccinations = $this->vaccinationRepo->getAll();

        return view('web.vaccinations', compact('pageTitle', 'vaccinations'));
    }

    public function vaccinationDetails($slug)
    {
        $vaccination = $this->vaccinationRepo->findWhere([['slug', $slug]]);

        $pageTitle = $vaccination->name;

        $share = \Share::currentPage($vaccination->name)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();

        return view('web.vaccination-details', compact('pageTitle', 'vaccination', 'share'));
    }
}
