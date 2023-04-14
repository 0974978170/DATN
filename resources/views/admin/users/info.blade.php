@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly disabled class="form-control-plaintext" id="" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label text-right">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly disabled class="form-control-plaintext" id="" value="{{$user->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label text-right">Phone</label>
                <div class="col-sm-10">
                    <input type="text" readonly disabled class="form-control-plaintext" id="" value="0{{$user->phone_number}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label text-right">Gender</label>
                <div class="col-sm-10">
                    <input type="text" readonly disabled class="form-control-plaintext" id="" value="{{$user->gender}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label text-right">Roles</label>
                <div class="col-sm-10">
                    <input type="text" readonly disabled class="form-control-plaintext" id="" value="{{$user->roles}}">
                </div>
            </div>
        </div>

        <div class="card-footer">

        </div>
        @csrf
    </form>
@endsection

