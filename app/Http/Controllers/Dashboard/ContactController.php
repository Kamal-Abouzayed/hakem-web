<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\ReplyContact;
use App\Repositories\Contract\ContactRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected $contactRepo;

    public function __construct(ContactRepositoryInterface $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'رسائل التواصل';

        $contacts = $this->contactRepo->getAll();

        return view('dashboard.contacts.index', compact('pageTitle', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reply($id)
    {
        $pageTitle = 'الرد على رسائل التواصل';

        $contact = $this->contactRepo->findOne($id);

        if ($contact) {
            return view('dashboard.contacts.reply', compact('contact', 'pageTitle'));
        } else {
            return view('errors.404');
        }
    }

    public function sendReply(Request $request, $id)
    {
        $contact = $this->contactRepo->findOne($id);

        if ($contact) {

            $data = $request->input('reply');

            Mail::to($contact->email)->send(new ReplyContact($data));

            $contact->update(['isReply' => 1]);

            return redirect()->route('dashboard.contacts.show', $contact->id)->with('success', 'تم ارسال الرد الخاص بك ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'رسائل التواصل';

        $contact = $this->contactRepo->findOne($id);

        if ($contact) {
            return view('dashboard.contacts.show', compact('contact', 'pageTitle'));
        } else {
            return view('errors.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
