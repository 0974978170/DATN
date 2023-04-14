@extends('admin.main')

@section('content')
    <form action="/admin/users/change-password" method="POST">
        <div class="card-body">
            <div class="container">
{{--                <form>--}}
{{--                    <p>--}}
{{--                        <label>Username:</label>--}}
{{--                        <input type="text"--}}
{{--                               name="userID" id="userID">--}}
{{--                    </p>--}}

{{--                    <p>--}}
{{--                        <label>Password:</label>--}}
{{--                        <input type="password"--}}
{{--                               name="password" id="password" />--}}
{{--                        <i class="bi bi-eye-slash" style="margin-left: -30px; cursor: pointer"--}}
{{--                           id="togglePassword"></i>--}}
{{--                    </p>--}}

{{--                    <button type="submit" id="submit"--}}
{{--                            class="btn btn-primary">--}}
{{--                        Log In--}}
{{--                    </button>--}}
{{--                </form>--}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input name="newpassword" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input name="confirmpassword" type="text" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                    </div>
{{--                    <div class="form-check">--}}
{{--                        <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                        <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--                    </div>--}}
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="card-footer">

        </div>
        @csrf
    </form>
@endsection

