@extends('layouts.laylout')
@section('title')
    كل الرتب
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>كل الرتب</h3>
                    <a href="{{ url('/admin/ranks/add') }}" class="btn btn-success">
                        إضافة رتبة
                    </a>
                </div>


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">الرتبة</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ranks as $index => $rank)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $rank->rank }}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" title="حذف الرتبة" href="{{ url('/admin/ranks/delete', $rank->id) }}">
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
