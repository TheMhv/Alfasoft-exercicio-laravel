@extends('contact.layout')

@section('card-header')
<div class="card-header d-flex justify-content-between bg-primary text-white">
    <h3 class="card-title">Show contact</h3>
</div>
@endsection

@section('card-body')

<div class="card-body row">
    <div class="col-lg-12 mx-auto mb-3">
        <div class="form-group">
            <label for="name" class="form-label"><i class="fa fa-user fa-sm"></i> Name:</label>
            <input id="name" type="text" class="form-control" value="{{ $contact->name }}" readonly>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div class="form-group">
            <label for="contact" class="form-label"><i class="fa fa-phone fa-sm"></i> Contact:</label>
            <input id="contact" type="text" class="form-control" name="contact" value="{{ $contact->contact }}" readonly>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div class="form-group">
            <label for="email" class="form-label"><i class="fa fa-envelope fa-sm"></i> Email:</label>
            <input id="email" type="text" class="form-control" value="{{ $contact->email }}" readonly>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div class="form-group">
            <label for="created_at" class="form-label"><i class="fa fa-clock fa-sm"></i> Created At:</label>
            <input id="created_at" type="text" class="form-control" value="{{ $contact->created_at }}" readonly>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div class="form-group">
            <label for="updated_at" class="form-label"><i class="fa fa-clock fa-sm"></i> Updated At:</label>
            <input id="updated_at" type="text" class="form-control" value="{{ $contact->updated_at }}" readonly>
        </div>
    </div>
</div>
@endsection

@section('card-footer')
<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('contact.index') }}" class="btn btn-secondary">Back <i class="fa fa-reply fa-sm"></i></a>
    <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning">Edit <i class="fa fa-pencil fa-sm"></i></a>
    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="d-inline m-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash-alt fa-sm"></i></button>
    </form>
</div>
@endsection