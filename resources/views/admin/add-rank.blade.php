@extends('layouts.laylout')
@section('title')
    إضافة رتبة
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">إضافة رتبة</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/admin/ranks/addRankPost', []) }}">
                            @csrf
                            <div class="form-group">
                                <label>الرتبة</label>
                                <input type="text" name="rank" class="form-control">
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">تسجيل</button>
                                <a class="btn btn-dark" href="{{ url('/admin/ranks', []) }}">رجوع</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
