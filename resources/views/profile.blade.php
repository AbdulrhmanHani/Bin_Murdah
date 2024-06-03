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
    <title>Company name | {{ auth()->user()->name }} تغيير كلمة مرور المستخدم</title>
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

    <div class="container-fluid p-5 mx-2">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">تغيير كلمة مرور المستخدم {{ auth()->user()->name }}</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/profile/update') }}">
                            @csrf
                            <div class="form-group">
                                <label>اسم المستخدم</label>
                                <input type="text" disabled placeholder="{{ auth()->user()->name }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>بريد المستخدم</label>
                                <input type="email" disabled placeholder="{{ auth()->user()->email }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>رقم هاتف المستخدم</label>
                                <input type="number" disabled placeholder="{{ auth()->user()->phone }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>كلمة المرور الجديدة</label>
                                <input type="password" placeholder="*********" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>تأكيد كلمة المرور الجديدة</label>
                                <input type="password" placeholder="*********" name="password_confirmation"
                                    class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">تحديث</button>
                                <a class="btn btn-dark" href="{{ url('/', []) }}">رجوع</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- javaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
