<?php

namespace App\Interfaces\Contacts;

interface ContactInterface
{
    public function all();
    public function find($id);
    public function store(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function bulkImportFromXML($xmlContent);
}
