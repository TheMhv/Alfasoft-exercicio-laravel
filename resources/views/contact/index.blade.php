@extends('contact.layout')

@section('card-header')
<div class="card-header d-flex justify-content-between bg-primary text-white">
    <h3 class="card-title">Contacts</h3>
    <a href="{{ route('contact.create') }}" class="btn btn-success">Create <i class="fa fa-plus fa-sm"></i></a>
</div>
@endsection

@section('card-body')

<div class="card-body row">
    <div class="col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td scope="row">{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>
                        <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-info">View <i class="fa fa-eye fa-sm"></i></a>
                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning">Edit <i class="fa fa-pencil fa-sm"></i></a>
                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash-alt fa-sm"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection