@extends('layouts.laylout')
@section('title')
    العملاء
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>كل العملاء</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">اسم العميل</th>
                            <th scope="col">اسم المباشر</th>
                            <th scope="col">اسم المندوب</th>
                            <th scope="col">ارقام الهاتف</th>
                            <th scope="col">الرتبة</th>
                            <th scope="col">نوع العميل</th>
                            <th scope="col">مكانة المباشر</th>
                            <th scope="col">المسؤول</th>

                            <th scope="col">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $index => $customer)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->Direct->name }}</td>
                                <td>{{ $customer->delegate_name }}</td>

                                <td>
                                    @foreach ($customer->PhoneNumbers as $phoneNumber)
                                        {{ $phoneNumber->phone_number1 }}<br>
                                        {{ $phoneNumber->phone_number2 }}<br>
                                        {{ $phoneNumber->phone_number3 }}
                                    @endforeach
                                </td>
                                <td>{{ $customer->rank }}</td>
                                <td>{{ $customer->type }}</td>
                                <td>{{ $customer->direct_standing }}</td>
                                <td>{{ $customer->admin_name }}</td>

                                <td>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/admin/customers/delete', $customer->id) }}">
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
