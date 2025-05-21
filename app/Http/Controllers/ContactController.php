<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest ;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $service)
    {
        $this->contactService = $service;
    }

    public function index()
    {
        $contacts = $this->contactService->getAll();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $this->contactService->create($request->all());
        return redirect()->route('contacts.index')
        ->with('success', 'Contact created successfully.');
    }

    public function edit($id)
    {
        $contact = $this->contactService->getById($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest  $request, $id)
    {
        $this->contactService->update($id, $request->all());
        return redirect()->route('contacts.index')
        ->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $this->contactService->delete($id);
        return redirect()->route('contacts.index');
    }

    public function importForm()
    {
        return view('contacts.import');
    }

    public function import(Request $request)
    {
        try {
            $xmlContent = file_get_contents($request->file('xml_file'));
            $this->contactService->importFromXML($xmlContent);
            return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully.');
        } catch (\Throwable $th) {
            \Log::error('XML Import Error: ' . $th->getMessage());

        return redirect()->back()
            ->withErrors(['import_error' => 'Failed to import contacts. Error: ' . $th->getMessage()])
            ->withInput();
        }
        
    }
}
