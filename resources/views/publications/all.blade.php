<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/all.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- Css file -->
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}" />
    <title>Company name | المنشورات</title>
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
    <!-- Start Posts -->
    <div class="posts-parent">
        <div class="content">
            <div id="posts-child">
                <div class="container-fluid text-center table-x">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ناشئ المنشور</th>
                                <th scope="col">الإنشاء الإرسال</th>
                                <th scope="col">موضوع المنشور</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (auth()->user()->role_as == 'SUPER_ADMIN')
                                @foreach ($superPublications as $publication)
                                    <tr>
                                        <td>{{ $publication->User->name }}</td>
                                        <td>{{ $publication->created_at }}</td>
                                        <td><a
                                                href="{{ url('/public/view', [$publication->id]) }}">{{ $publication->publish_title }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach ($publications as $publication)
                                    <tr>
                                        <td>{{ $publication->User->name }}</td>
                                        <td>{{ $publication->created_at }}</td>
                                        <td><a
                                                href="{{ url('/public/view', [$publication->id]) }}">{{ $publication->publish_title }}</a>
                                        </td>
                                    </tr>
                                @endforeach

                                @foreach ($viewers as $viewer)
                                    <tr>
                                        <td>{{ $viewer->Publication->User->name }}</td>
                                        <td>{{ $viewer->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/public/view', [$viewer->publication->id]) }}">
                                                {{ $viewer->publication->publish_title }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Posts -->

        <!-- javaScript -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    </div>
</body>

</html>
