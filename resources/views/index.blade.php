<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/all.min.css') }}">
    <!-- Css file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Company name | الصفحة الرئيسية</title>
</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container-fluid ">
            <a class="navbar-brand mx-5" href="{{ url('/', []) }}"><strong>اسم الشركه</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">
                    <li class="nav-item">
                        <a class="nav-link active mx-1 px-1" aria-current="page"
                            href="{{ url('/addCustomer', []) }}">اضافة
                            عميل
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mx-1 px-1" title="إنشاء رسالة" aria-current="page"
                            href="{{ url('/createPost', []) }}">
                            إنشاء رسالة
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mx-1 px-1" title="جميع الرسائل" aria-current="page"
                            href="{{ url('/posts', []) }}">
                            جميع الرسائل
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mx-1 px-1" title="إنشاء منشور" aria-current="page"
                            href="{{ url('/public/create', []) }}">
                            إنشاء منشور
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mx-1 px-1" title="جميع المنشورات" aria-current="page"
                            href="{{ url('/public/all', []) }}">
                            جميع المنشورات
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (auth()->user()->role_as == 'SUPER_ADMIN')
                            <a class="nav-link active" aria-current="page" href="{{ url('/admin') }}">
                                <strong>
                                    {{ auth()->user()->name }} | المسؤول
                                </strong>
                            </a>
                        @else
                            <a class="nav-link active" href="{{ url('/profile') }}" aria-current="page">
                                <strong>
                                    {{ auth()->user()->name }}
                                </strong>
                            </a>
                        @endif
                    </li>
                    <li class="mr-5 px-5 nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/logout', []) }}">تسجيل
                            الخروج</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Start Customers Data -->
    @if (auth()->user()->allPower === 'allPower')
        <form action="{{ url('/filter') }}" method="GET">
            <div class="parent-customers-data">
                <h2>بيانات العملاء</h2>

                <select name="type">
                    @foreach ($types as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                    @endforeach
                    <option disabled value="" selected>نوع العميل</option>
                </select>


                <select name="user">
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                    <option disabled value="" selected>المستخدمين</option>
                </select>


                <select name="user">
                    @foreach ($delegates as $delegate)
                        <option value="{{ $delegate->name }}">{{ $delegate->name }}</option>
                    @endforeach
                    <option disabled value="" selected>المندوبين</option>
                </select>


                <select name="rank">
                    @foreach ($ranks as $rank)
                        <option value="{{ $rank->rank }}">{{ $rank->rank }}</option>
                    @endforeach
                    <option disabled value="" selected>الرتبة</option>
                </select>


                <select name="continue">
                    @foreach ($continues as $continue)
                        <option value="{{ $continue->continue }}" selected>{{ $continue->continue }}</option>
                    @endforeach
                    <option disabled value="" selected>الاستمرارية</option>
                </select>


                <select name="standing">
                    @foreach ($standings as $standing)
                        <option value="{{ $standing->standings }}">{{ $standing->standings }}</option>
                    @endforeach
                    <option disabled value="" selected>مكانة المباشر</option>
                </select>


                <select name="note">
                    @foreach ($notes as $note)
                        <option value="{{ $note->note }}">{{ $note->note }}</option>
                    @endforeach
                    <option disabled value="" selected>الملاحظات</option>
                </select>


                <button type="submit" class="btn btn-primary text-light mx-3">
                    إظهار التنائج
                </button>
            </div>
        </form>
    @endif








    <button type="reset" class="btn btn-info text-light mx-3 mt-4" onclick="window.print()">
        طباعة
    </button>

    </div>
    <form action="{{ url('/search') }}" method="GET">
        <input type="text" name="key"
            class="my-4 text-center form-control container"style="border: 3px rgb(74, 215, 215) dotted"
            placeholder="بحث في بيانات العملاء">
    </form>
    <div class="container-fluid text-center parent-table">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">تعديل</th>
                    <th scope="col">نوع العميل</th>
                    <th scope="col">المستخدم</th>
                    <th scope="col">اسم العميل</th>
                    <th scope="col">الرتبة</th>
                    <th scope="col">الاستمرارية</th>
                    <th scope="col">المباشر</th>
                    <th scope="col">المندوب</th>
                    <th scope="col">مكانة المباشر</th>
                    <th scope="col">أرقام الجوال</th>
                    <th scope="col">ملاحظات</th>
                    <th scope="col">الملاحظة</th>
                </tr>
            </thead>
            @foreach ($customers as $index => $customer)
                <tbody>
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ url('/customer/edit', $customer->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>{{ $customer->type }}</td>
                        <td>{{ $customer->admin_name }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->rank }}</td>
                        <td>{{ $customer->continue }}</td>
                        <td>{{ $customer->direct_name }}</td>
                        <td>{{ $customer->delegate_name }}</td>
                        <td>{{ $customer->direct_standing }}</td>
                        <td>
                            @foreach ($customer->Phones as $phone)
                                <div>
                                    <a href="https://wa.me/{{ $phone->phone_number1 }}" target="_blank"
                                        class="whatsapp">
                                        <img src="./whatsapp.svg" alt="" />
                                    </a>
                                    <span>
                                        {{ $phone->phone_number1 }}<br>
                                    </span>
                                    @if ($phone->phone_number2)
                                        <a href="https://wa.me/{{ $phone->phone_number2 }}" target="_blank"
                                            class="whatsapp">
                                            <img src="./whatsapp.svg" alt="" />
                                        </a>
                                        <span>
                                            {{ $phone->phone_number2 }}<br>
                                        </span>
                                    @endif
                                    @if ($phone->phone_number3)
                                        <a href="https://wa.me/{{ $phone->phone_number3 }}" target="_blank"
                                            class="whatsapp">
                                            <img src="./whatsapp.svg" alt="" />
                                        </a>
                                        <span>
                                            {{ $phone->phone_number3 }}<br>
                                        </span>
                                    @endif
                                </div>
                            @endforeach

                        </td>
                        <td>{{ $customer->notes }}</td>
                        <td>{{ $customer->note }}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- End Customers Data -->
    <!-- scroll Top -->
    <div class="scroll-btn">
        <i class="fa fa-angle-double-up"></i>
    </div>
    <!-- javaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
