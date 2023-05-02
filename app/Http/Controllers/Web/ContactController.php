<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ContactRequest;
use App\Repositories\Contract\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function showForm()
    {
        $pageTitle = __('Contact Us');

        return view('web.contact', compact('pageTitle'));
    }

    public function sendContact(ContactRequest $request)
    {

        $this->contactRepository->create($request->all());

        return redirect()->back()->with('success', __('Message sent successfully'));
    }
}
