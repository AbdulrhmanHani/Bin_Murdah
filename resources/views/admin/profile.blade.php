@extends('layouts.laylout')
@section('title')
    تعديل بيانات المسؤول
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">تعديل بيانات المسؤول</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/admin/profile/update') }}">
                            @csrf
                            <div class="form-group">
                                <label>اسم المسؤول</label>
                                <input type="text" value="{{ auth()->user()->name }}" disabled class="form-control">
                            </div>
                            <div class="form-group">
                                <label>بريد المسؤول</label>
                                <input type="email" value="{{ auth()->user()->email }}" disabled class="form-control">
                            </div>

                            <div class="form-group">
                                <label>رقم هاتف المسؤول</label>
                                <input type="email" value="{{ auth()->user()->phone }}" disabled class="form-control">
                            </div>

                            <div class="form-group">
                                <label>كلمة المرور الجديدة</label>
                                <input type="password" placeholder="****************" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>تأكيد كلمة المرور</label>
                                <input type="password" placeholder="****************" name="password_confirmation" class="form-control">
                            </div>


                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">تعديل</button>
                                <a class="btn btn-dark" href="{{ url('/admin/admins', []) }}">رجوع</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
