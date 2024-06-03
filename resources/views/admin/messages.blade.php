@extends('layouts.laylout')
@section('title')
    كل الرسائل
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>كل الرسائل</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">من</th>
                            <th scope="col">إلي</th>
                            <th scope="col">عنوان الرسالة</th>
                            <th scope="col">محتوي الرسالة</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $index => $message)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $message->creator_name }}</td>
                                <td>{{ $message->User->name }}</td>
                                <td>{{ $message->title }}</td>
                                <td>{{ $message->content }}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="{{ url('/admin/messages/delete', $message->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
