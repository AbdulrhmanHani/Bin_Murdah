@extends('layouts.laylout')
@section('title')
    إضافة إستمرارية
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">إضافة إستمرارية</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/admin/continues/addPost', []) }}">
                            @csrf
                            <div class="form-group">
                                <label>اسم الإستمرارية</label>
                                <input type="text" name="continue" class="form-control">
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">إضافة</button>
                                <a class="btn btn-dark" href="{{ url('/admin/continues', []) }}">رجوع</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
