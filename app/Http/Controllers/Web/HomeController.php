<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Visitor;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $articleRepo;

    public function __construct(ArticleRepositoryInterface $articleRepo)
    {
        $this->articleRepo = $articleRepo;
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
}
