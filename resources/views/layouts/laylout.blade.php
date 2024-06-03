<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اسم الشركة | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/admin-styles/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-styles/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-styles/plugins/all.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #871141">
        <div class="d-flex justify-content-center">
            <a class="navbar-brand text-light mr-5 pr-5" href="{{ url('/admin', []) }}">لوحة تحكم الشركة</a>
            <a class="navbar-brand text-light" href="{{ url('/', []) }}"><strong>الصفحة الرئيسية</strong></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon d-flex justify-content-center pt-1 text-light"
                style="width: auto;background-color: #871141">الخيارات</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            {{-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item active">
                    <a class="nav-link text-light mx-3" href="{{ url('/admin/customers', []) }}">العملاء</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mx-3" href="{{ url('/admin/directs', []) }}">المباشرين</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mx-3" href="{{ url('/admin/admins', []) }}">المندوبين</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mx-3" href="{{ url('/admin/messages', []) }}">الرسائل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mx-3" href="{{ url('/admin/ranks', []) }}">الرتب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mx-3" href="{{ url('/admin/continues', []) }}">الإستمرارية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mx-3" href="{{ url('/admin/publications', []) }}">المنشورات</a>
                </li>
            </ul> --}}
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="text-light nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $name }} | مسؤول الموقع
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #950652">
                        <a class="dropdown-item text-light" href="{{ url('/admin/profile', []) }}">تعديل الصفحة الشخصية</a>
                        <a class="dropdown-item text-light" href="{{ url('/admin/notify', []) }}">الإشعارات</a>
                        <a class="dropdown-item text-light" href="{{ url('/logout', []) }}">تسجيل الخروج</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @yield('main')
    <script src="{{ asset('admin-styles/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('admin-styles/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
