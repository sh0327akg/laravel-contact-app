<?php

namespace App\Http\Controllers;

use App\Services\ContactServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    private ContactServiceInterface $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {   
        $contacts = $this->contactService->getContacts();
        return view('contact.index',compact('contacts'));
    }

    public function create()
    {
        $departments = $this->contactService->getDepartments();
        return view('contact.create', compact('departments'));
    }

    public function store(ContactRequest $request)
    {
        DB::transaction(function() use ($request){
            $this->contactService->createContact(
                $request->department_id,
                $request->name,
                $request->email,
                $request->content,
                (int)$request->age,
                (int)$request->gender
            );
        });
        return redirect()->route('contact.index');
    }
}
