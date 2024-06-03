@extends('layouts.laylout')
@section('title')
    {{ $admin->name }} تعديل علي المندوب
@endsection
@section('main')
    <div class="container-fluid text-left py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">{{ $admin->name }} تعديل علي المندوب</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/admin/admins/edit', $admin->id) }}">
                            @csrf
                            <div class="form-group">
                                <label>اسم المندوب</label>
                                <input type="text" value="{{ $admin->name }}" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>بريد المندوب</label>
                                <input type="email" value="{{ $admin->email }}" name="email" class="form-control">
                            </div>
                            <label>التصريح للمندوب بالمشاركة</label>
                            <br>
                            <select class="form-control" name="canJoin">
                                <option value="yes">نعم</option>
                                <option selected value="no">لا</option>
                            </select>
                            <br>
                            <div class="container">
                                <h3>صلاحيات المستخدم</h3>
                                <br>
                                <div class="text-center">
                                    <label for="aaa">
                                        <h4>جميع الصلاحيات </h4>
                                    </label>
                                    <input id="aaa" type="radio" name="allPower">
                                </div>
                                <br>
                                <select name="typePower" class="form-control">
                                    <option value="" disabled selected>نوع العميل</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="userPower" class="form-control">
                                    <option value="" disabled selected>المستخدم</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="delegatePower" class="form-control">
                                    <option value="" disabled selected>المندوب</option>
                                    @foreach ($delegates as $delegate)
                                        <option value="{{ $delegate->name }}">{{ $delegate->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="rankPower" class="form-control">
                                    <option value="" disabled selected>رتبة العميل</option>
                                    @foreach ($ranks as $rank)
                                        <option value="{{ $rank->rank }}">{{ $rank->rank }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="continuePower" class="form-control">
                                    <option value="" disabled selected>الإستمرارية</option>
                                    @foreach ($continues as $continue)
                                        <option value="{{ $continue->continue }}">{{ $continue->continue }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="standingPower" class="form-control">
                                    <option value="" disabled selected>مكانة المباشر</option>
                                    @foreach ($standings as $standing)
                                        <option value="{{ $standing->standings }}">{{ $standing->standings }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="notePower" class="form-control">
                                    <option value="" disabled selected>الملاحظة</option>
                                    @foreach ($notes as $note)
                                        <option value="{{ $note->note }}">{{ $note->note }}</option>
                                    @endforeach
                                </select>
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
