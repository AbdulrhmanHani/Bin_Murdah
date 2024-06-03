<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap file -->
    <!-- Css file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin-styles/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/bootstrap.bundle.min.js') }}">
    <link rel="stylesheet" href="{{ asset('/admin-styles/plugins/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/all.min.css') }}">
    <title>Company name | {{ $customer->name }} التعديل علي العميل</title>
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

    <div class="container-fluid py-5 text-center">
        <div class="row">
            <div class="col-lg-12 col-md-6 offset-md-3">
                <h3 class="mb-3"><span class="text-info">{{ $customer->name }}</span> تعديل علي العميل</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/customer/edit', $customer->id) }}">
                            @csrf
                            <div class="form-group">
                                <label>اسم العميل</label>
                                <input type="text" value="{{ $customer->name }}" name="username"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>نوع العميل</label>
                                <select class="form-control" name="type">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>المندوب</label>
                                <select class="form-control" name="user">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>الرتبة</label>
                                <select class="form-control" name="rank">
                                    @foreach ($ranks as $rank)
                                        <option value="{{ $rank->rank }}">{{ $rank->rank }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>الاستمرارية</label>
                                <select class="form-control" name="continue">
                                    @foreach ($continues as $continue)
                                        <option value="{{ $continue->continue }}">{{ $continue->continue }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label>المباشر</label>
                                <select class="form-control" name="direct">
                                    @foreach ($directs as $direct)
                                        <option value="{{ $direct->id }}">{{ $direct->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label>مكانة المباشر </label>
                                <select class="form-control" name="standing">
                                    @foreach ($standings as $standing)
                                        <option value="{{ $standing->standings }}">{{ $standing->standings }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>أرقام الجوال</label>
                                @foreach ($customer->Phones as $phone)
                                    <input type="text" value="{{ $phone->phone_number1 }}"
                                        name="phone_number1"class="form-control">
                                    <input type="text" value="{{ $phone->phone_number2 }}"
                                        name="phone_number2"class="form-control">
                                    <input type="text" value="{{ $phone->phone_number3 }}"
                                        name="phone_number3"class="form-control">
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label>ملاحظات</label>
                                <input type="text" value="{{ $customer->notes }}" name="notes"
                                    class="form-control">
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">تعديل</button>
                                <a class="btn btn-dark" href="{{ url('/', []) }}">رجوع</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- scroll Top -->
    <div class="scroll-btn">
        <i class="fa fa-angle-double-up"></i>
    </div>
    <!-- javaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
