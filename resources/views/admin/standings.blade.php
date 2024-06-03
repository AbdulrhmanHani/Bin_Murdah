@extends('layouts.laylout')
@section('title')
    المكانة
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>المكانة</h3>
                    <a href="{{ url('/admin/standings/add') }}" class="btn btn-success">
                        إضافة مكانة
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">المكانة</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($standings as $index => $standing)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <th scope="row">{{ $standing->standings }}</th>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/admin/standings/delete', $standing->id) }}">
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
