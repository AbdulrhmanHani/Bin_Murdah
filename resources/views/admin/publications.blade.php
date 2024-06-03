@extends('layouts.laylout')
@section('title')
    المنشورات
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>المنشورات</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">صاحب المنشور</th>
                            <th scope="col">من يستطيع قرائة المنشور</th>
                            <th scope="col">عنوان المنشور</th>
                            <th scope="col">محتوي المنشور</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publications as $index => $publication)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $publication->User->name }}</td>
                                <td>
                                    @foreach ($publication->Viewers as $index => $viewer)
                                        {{ $index + 1 . '- ' . $viewer->User->name }}<br>
                                    @endforeach

                                </td>
                                <td>{{ $publication->publish_title }}</td>
                                <td>{{ $publication->publish_content }}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/admin/publications/delete', $publication->id) }}">
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
