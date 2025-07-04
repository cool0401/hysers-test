<?php

namespace App\Http\Controllers;

use App\Services\ContactService;

use Inertia\Inertia;

class ContactPageController extends Controller
{

    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllPaginated();
        return Inertia::render('ListContacts', ['contacts' => $contacts]);
    }

    public function edit($id)
    {
        $contact = $this->contactService->getById($id);

        return Inertia::render('EditContact', ['contact' => $contact]);
    }

    public function destroy($id)
    {
        $this->contactService->delete($id);

        return redirect()->route('contacts.ui')->with('message', 'Contact deleted.');
    }
}
