<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Repositories\Contract\VideoRepositoryInterface;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $videoRepo;

    public function __construct(VideoRepositoryInterface $videoRepo)
    {
        $this->videoRepo = $videoRepo;
    }

    public function index()
    {
        $pageTitle = __('Videos');

        $videos = $this->videoRepo->getAll();

        return view('web.videos', compact('pageTitle', 'videos'));
    }

    public function videoDetails($slug)
    {
        $video = $this->videoRepo->findWhere([['slug', $slug]]);

        $pageTitle = $video->name;

        $share = \Share::currentPage($video->name)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();

        return view('web.video-details', compact('pageTitle', 'video', 'share'));
    }

    public function searchVideos(Request $request)
    {
        $pageTitle = __('Search Results');

        $searchTerm = $request->searchTerm;

        $videos = Video::where('name_ar', 'LIKE', "%{$searchTerm}%")
            ->orWhere('name_en', 'LIKE', "%{$searchTerm}%")
            ->orWhere('desc_ar', 'LIKE', "%{$searchTerm}%")
            ->orWhere('desc_en', 'LIKE', "%{$searchTerm}%")
            ->get();

        // dd($videos);

        return view('web.search-videos', compact('pageTitle', 'videos'));
    }
}
