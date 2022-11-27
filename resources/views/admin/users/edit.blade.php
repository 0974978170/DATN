@extends('admin.main')

@section('content')
    <form action="/admin/users/edit/{{ $users->id }}" method="POST">
        <div class="card-body">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-12 col-lg-9 col-xl-7">
                            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">User Form</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <input type="text" id="firstName" value="{{ $users->first_name }}" name="firstName" class="form-control form-control-lg" />
                                                <label class="form-label" for="firstName">Họ Tên Đệm</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <input type="text" id="lastName" value="{{ $users->last_name }}" name="lastName" class="form-control form-control-lg" />
                                                <label class="form-label" for="lastName">Tên</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <h6 class="mb-2 pb-1">Gender: </h6>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                                                       value="Female" {{$users->gender == 'Female' ? 'checked' : ''}} />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                                                       value="Male" {{$users->gender == 'Male' ? 'checked' : ''}}/>
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                                                       value="Other" {{$users->gender == 'Other' ? 'checked' : ''}}/>
                                                <label class="form-check-label" for="otherGender">Other</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="tel" id="phoneNumber" value="0{{ $users->phone_number }}" name="phoneNumber" class="form-control form-control-lg" />
                                                <label class="form-label" for="phoneNumber">Số điện thoại</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="email" id="email" value="{{ $users->email }}" name="email" class="form-control form-control-lg" />
                                                <label class="form-label" for="emailAddress">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="password" value="{{ old('password') }}" class="form-control" id="Password" name="password">
                                                <label class="form-label" for="phoneNumber">Password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2">
                                        <button type="submit" class="btn btn-primary">Sửa User</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @csrf
    </form>
@endsection

