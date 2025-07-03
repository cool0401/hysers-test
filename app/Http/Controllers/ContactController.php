<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllPaginated();
        return view('contacts.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|min:10|max:20',
        ]);

        $data['phone'] = preg_replace('/\D/', '', $data['phone']);
        $contact = $this->contactService->create($data);

        return response()->json($contact, 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|min:10|max:20',
        ]);

        $updated = $this->contactService->update($id, $data);

        return response()->json($updated, 200);
    }

    public function destroy($id)
    {
        $this->contactService->delete($id);

        return response()->json(['message' => 'Contact deleted.']);
    }
}
