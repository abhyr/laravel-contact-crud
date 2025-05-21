@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Add Contact</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Phone:</label>
            <input type="text" name="contact" value="{{ old('contact', $contact->contact ?? '') }}" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
