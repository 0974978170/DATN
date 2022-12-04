@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Họ Tên</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Câu hỏi</th>
            <th>Trạng Thái</th>
            <th>Ngày tạo câu hỏi</th>
            <th style="width: 100px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $key => $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>0{{ $contact->phone }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->content }}</td>
                <td>{!! \App\Helpers\Helper::active($contact->active_flag) !!}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm"
                    onclick="updateRow({{$contact->id}}, '/admin/contacts/edit')">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $contacts->links() !!}
    </div>
@endsection


