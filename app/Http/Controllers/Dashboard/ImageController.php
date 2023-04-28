<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Repositories\Contract\ImageRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    protected $imageRepo;

    public function __construct(ImageRepositoryInterface $imageRepo)
    {   
        $this->imageRepo = $imageRepo;
    }

    public function index()
    {
        $pageTitle = 'معرض الصور';

        $images = $this->imageRepo->getAll();

        return view('dashboard.images.index', compact('images', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'إضافة صور';

        return view('dashboard.images.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $data['img'] = $request->file('file')->store('images');

        // dd($data);

        $this->imageRepo->create($data);

        return response()->json([
            'message' => 'تمت الإضافة بنجاح',
        ]);
    }

    public function destroy(Request $request)
    {
        $image = $this->imageRepo->findOne($request->id);

        if ($image->img) {
            Storage::delete($image->img);
        }

        $image->delete();

        return response()->json([
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
