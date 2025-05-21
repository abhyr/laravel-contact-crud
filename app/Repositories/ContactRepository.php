<?php
namespace App\Repositories;

use App\Models\User;
use App\Interfaces\Contacts\ContactInterface;
use Illuminate\Support\Facades\DB;

class ContactRepository implements ContactInterface
{
    public function all() {
        return User::all();
    }

    public function find($id) {
        return User::findOrFail($id);
    }

    public function store(array $data) {
        return User::create($data);
    }

    public function update($id, array $data) {
        $contact = User::findOrFail($id);
        $contact->update($data);
        return $contact;
    }

    public function delete($id) {
        return User::destroy($id);
    }

    public function bulkImportFromXML($xmlContent) {
        $xml = simplexml_load_string($xmlContent);
        foreach ($xml->contact as $contact) {
            User::create([
                'name' => (string) $contact->name,
                'contact' => (string) $contact->phone,
            ]);
        }
    }
}
