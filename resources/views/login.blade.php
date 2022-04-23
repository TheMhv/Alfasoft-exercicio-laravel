@extends('contact.layout')

@section('card-header')
<div class="card-header d-flex justify-content-between bg-primary text-white">
    <h3 class="card-title">Login</h3>
</div>
@endsection

@section('card-body')

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="card-body row">
        <div class="col-lg-12 mb-3">
            <div class="form-group">
                <label for="user">User</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="User">
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
        <button type="submit" class="btn btn-success">Login <i class="fa fa-sign-in fa-sm"></i></button>
    </div>
</form>
@endsection