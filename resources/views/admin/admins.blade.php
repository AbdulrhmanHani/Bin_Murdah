@extends('layouts.laylout')
@section('title')
    المستخدمين
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>كل المستخدمين</h3>
                    <a href="{{ url('/admin/admins/add') }}" class="btn btn-success">
                        إضافة مستخدم
                    </a>
                </div>


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">اسم المستخدم</th>
                            <th scope="col">بريد المستخدم</th>
                            <th scope="col">رقم هاتف المستخدم</th>
                            <th scope="col">حالة المستخدم</th>
                            <th scope="col">هل المستخدم مصرح له بالمشاركة ؟</th>
                            <th scope="col">صلاحيات المستخدم</th>
                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                @if ($user->is_online == 1)
                                    <td class="text-success">متصل</td>
                                @else
                                    <td class='text-danger'>غير متصل</td>
                                @endif
                                <td>
                                    @if ($user->can == 'no')
                                        <span class="text-danger">لا</span>
                                    @else
                                        <span class="text-success">نعم</span>
                                    @endif

                                </td>
                                <td>
                                    {{ $user->allPower}} |
                                    {{ $user->typePower}} |
                                    {{ $user->userPower}} |
                                    {{ $user->delegatePower}} |
                                    {{ $user->rankPower}} |
                                    {{ $user->continuePower}} |
                                    {{ $user->standingPower}} |
                                    {{ $user->notePower}} |
                                </td>

                                <td>

                                    <a class="btn btn-sm btn-info" href="{{ url('/admin/admins/edit', $user->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('/admin/admins/delete', $user->id) }}">
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
