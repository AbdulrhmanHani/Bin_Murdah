@extends('layouts.laylout')
@section('title')
    الإستمرارية
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>الإستمرارية</h3>
                    <a href="{{ url('/admin/continues/add') }}" class="btn btn-success">
                        إضافة إستمرارية
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">الإستمرارية</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($continues as $index => $continue)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $continue->continue }}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/admin/continues/delete', $continue->id) }}">
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
