@extends('layouts.laylout')
@section('title')
    الملاحظات
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>كل الملاحظات</h3>
                    <a href="{{ url('/admin/notes/add') }}" class="btn btn-success">
                        إضافة ملاحظة
                    </a>
                </div>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">الملاحظة</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $index => $note)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $note->note }}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/admin/note/delete', $note->id) }}">
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
