@extends('layouts.laylout')
@section('title')
    المباشرين
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>كل المباشرين</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">اسم المباشر</th>
                            <th scope="col">عدد تسجيلات المباشر</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($directs as $index => $direct)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $direct->name }}</td>
                                <td>{{ $direct->Total }}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/admin/directs/delete', $direct->name) }}">
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
