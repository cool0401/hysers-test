<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function paginate(int $perPage)
    {
        return Contact::paginate($perPage);
    }

    public function create(array $data): Contact
    {
        return Contact::create($data);
    }

    public function update(int $id, array $data): Contact
    {
        $contact = Contact::findOrFail($id);
        $contact->update($data);
        return $contact;
    }

    public function delete(int $id): void
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
    }

    public function find(int $id)
    {
        return Contact::findOrFail($id);
    }
}
