<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MailList;
use App\Repositories\Contract\MailListRepositoryInterface;
use Illuminate\Http\Request;

class MailListController extends Controller
{
    protected $mailListRepository;

    public function __construct(MailListRepositoryInterface $mailListRepository)
    {
        $this->mailListRepository = $mailListRepository;
    }

    public function index()
    {

        $pageTitle = 'القائمة البريدية';

        $mailLists = $this->mailListRepository->getAll();

        return view('dashboard.mail-list.index', compact('mailLists', 'pageTitle'));
    }

    public function deleteMail(Request $request)
    {
        $this->mailListRepository->delete($request->id);

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
