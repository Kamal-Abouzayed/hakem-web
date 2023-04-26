<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VideoRequest;
use App\Repositories\Contract\VideoRepositoryInterface;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $videoRepo;

    public function __construct(VideoRepositoryInterface $videoRepo)
    {
        $this->videoRepo = $videoRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'الفيديوهات';

        $videos = $this->videoRepo->getAll();

        return view('dashboard.videos.index', compact('videos', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة فيديو جديد';

        return view('dashboard.videos.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $data = $request->all();

        $this->videoRepo->create($data);

        return redirect()->route('dashboard.videos.index')->with('success', 'تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $video = $this->videoRepo->findWhere([['slug', $slug]]);

        return view('dashboard.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pageTitle = 'تعديل الفيديوهات';

        $video = $this->videoRepo->findWhere([['slug', $slug]]);

        return view('dashboard.videos.edit', compact('video', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $slug)
    {
        $video = $this->videoRepo->findWhere([['slug', $slug]]);

        $data = $request->except('_token', '_method');

        $video->update($data);

        return redirect()->route('dashboard.videos.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->videoRepo->delete($request->id);

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
