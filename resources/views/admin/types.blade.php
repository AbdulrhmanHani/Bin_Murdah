@extends('layouts.laylout')
@section('title')
    نوع العميل
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>نوع العميل</h3>
                    <a href="{{ url('/admin/type') }}" class="btn btn-success">
                        إضافة نوع عميل
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">النوع</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $index => $type)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $type->type }}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/admin/type/remove', $type->id) }}">
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
