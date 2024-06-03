@extends('layouts.laylout')
@section('title')
    إضافة مستخدم
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">إضافة مستخدم</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/admin/admins/addPost', []) }}">
                            @csrf
                            <div class="form-group">
                                <label>اسم المستخدم</label>
                                <input type="text" placeholder="username" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>بريد المستخدم</label>
                                <input type="email" placeholder="test@test.com" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>رقم هاتف المستخدم</label>
                                <input type="number" placeholder="012345678" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>كلمة المرور</label>
                                <input type="password" placeholder="*********" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>تأكيد كلمة المرور</label>
                                <input type="password" placeholder="*********" name="password_confirmation"
                                    class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">تسجيل</button>
                                <a class="btn btn-dark" href="{{ url('/admin/admins', []) }}">رجوع</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
