@extends('layouts.laylout')
@section('title')
    الإشعارات
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>الإشعارات</h3>
                    <a href="{{ url('/admin/notify/delete/all') }}" class="btn btn-danger">
                        حذف جميع الإشعارات
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">الإشعارات</th>
                            <th scope="col">تاريخ الإنشاء</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $index => $notification)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $notification->content }}</td>
                                <td>{{ $notification->created_at }}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/admin/notify/delete', $notification->id) }}">
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
