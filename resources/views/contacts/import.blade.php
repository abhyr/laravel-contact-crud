@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Import Contacts from XML</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Upload XML File:</label>
            <input type="file" name="xml_file" class="form-control" accept=".xml" required>
        </div>
        <button class="btn btn-primary">Import</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
