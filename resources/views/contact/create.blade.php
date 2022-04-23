@extends('contact.layout')

@section('card-header')
<div class="card-header d-flex justify-content-between bg-primary text-white">
    <h3 class="card-title">Create new contact</h3>
</div>
@endsection

@section('card-body')
<form action="{{ route('contact.store') }}" method="POST" class="m-0">
    @csrf

    <div class="card-body row">
        <div class="col-lg-12 mb-3">
            <div class="form-group">
                <label for="name" class="form-label"><i class="fa fa-user fa-sm"></i> Name:</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="Name of contact..." required>
            </div>
        </div>

        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="contact" class="form-label"><i class="fa fa-phone fa-sm"></i> Contact:</label>
                <input id="contact" type="text" maxlength="9" minlength="9" class="form-control" name="contact" placeholder="Contact number..." required>
            </div>
        </div>

        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="email" class="form-label"><i class="fa fa-envelope fa-sm"></i> Email:</label>
                <input id="email" type="text" class="form-control" name="email" placeholder="Contact email..." required>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger m-0 py-1">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    @endsection

    @section('card-footer')
    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('contact.index') }}" class="btn btn-secondary">Cancel <i class="fa fa-reply fa-sm"></i></a>
        <button type="submit" class="btn btn-success">Create <i class="fa fa-plus fa-sm"></i></button>
    </div>
</form>
@endsection