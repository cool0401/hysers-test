<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService
{
    protected ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAllPaginated(int $perPage = 10)
    {
        return $this->contactRepository->paginate($perPage);
    }

    public function create(array $data)
    {
        return $this->contactRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->contactRepository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->contactRepository->delete($id);
    }

    public function getById(int $id)
    {
        return $this->contactRepository->find($id);
    }
}
