@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th style="width: 300px">Họ Tên</th>
            <th style="width: 300px">Email</th>
            <th style="width: 160px">Gender</th>
            <th>Số điện thoại</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
{{--        <td>{{ $users }}</td>--}}
        @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender }}</td>
                <td>0{{ $user->phone_number }}</td>
                <td>{{ $user->roles }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{ $user->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $user->id }}, '/admin/users/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
{{--        {!! $users->links() !!}--}}
    </div>
@endsection


