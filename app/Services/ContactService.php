<?php

namespace App\Services;

use App\Interfaces\Contacts\ContactInterface;

class ContactService
{
    protected $contactRepo;

    public function __construct(ContactInterface $contactRepo) {
        $this->contactRepo = $contactRepo;
    }

    public function getAll() {
        return $this->contactRepo->all();
    }

    public function getById($id) {
        return $this->contactRepo->find($id);
    }

    public function create(array $data) {
        return $this->contactRepo->store($data);
    }

    public function update($id, array $data) {
        return $this->contactRepo->update($id, $data);
    }

    public function delete($id) {
        return $this->contactRepo->delete($id);
    }

    public function importFromXML($xmlContent) {
        return $this->contactRepo->bulkImportFromXML($xmlContent);
    }
}
