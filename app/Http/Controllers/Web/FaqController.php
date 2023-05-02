<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\FaqRepositoryInterface;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faqRepo;

    public function __construct(FaqRepositoryInterface $faqRepo)
    {
        $this->faqRepo = $faqRepo;
    }

    public function index()
    {
        $pageTitle = __('Questions and Answers');

        return view('web.faqs', compact('pageTitle'));
    }

    public function faqDetails($slug)
    {
        $faq = $this->faqRepo->findWhere([['slug', $slug]]);

        $pageTitle = $faq->question;

        $share = \Share::currentPage($faq->name)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();


        return view('web.faq-details', compact('faq', 'share', 'pageTitle'));
    }
}
