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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap file -->
    <!-- Css file -->
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}" />
    <title>Company name | إنشاء منشور</title>
</head>

<body>
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
    <!-- Start Create Post -->
    <div class="posts-parent">

        <div class="content">
            @include('layouts.errors')
            @if (request()->session()->has('send-succ'))
                <div class="container text-center py-2 alert-success">
                    <h5>{{ request()->session()->get('send-succ') }}</h5>
                </div>
            @endif
            <div class="post">
                <button class="create-post">إنشاء منشور</button>
                <form method="POST" action="{{ url('/public/createPublication', []) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <fieldset>
                        <legend>من يري المنشور: </legend>
                        <br>
                        <div class="d-flex">
                            <label for="allToSee">
                                <h5 class="text-success" for="allToSee">1- جميع الأشخاص</h5>
                            </label>
                            <input id="allToSee" class="mx-3" type="checkbox" name="allToSee" value="*">
                        </div>
                        <br>
                        @foreach ($users as $index => $user)
                            <label for="{{ $user->id }}">{{ $index + 2 }}- {{ $user->name }}</label>
                            <input id="{{ $user->id }}" type="checkbox" name="{{ $user->id }}"
                                value="{{ $user->id }}">
                            <br>
                            <br>
                        @endforeach
                    </fieldset>

                    <label for=""></label>
                    <input class="form-control mt-5 text-center" placeholder="عنوان المنشور" type="text"
                        name="postTitle">
                    <textarea name="postContent" cols="30" maxlength="255" placeholder="محتوي المنشور" rows="5"
                        class="textarea-post"></textarea>
                    <input type="file" name="publicImg">
                    <br>
                    <br>
                    <button my-5 type="submit" class="save-post">أضف المنشور</button>
                </form>
            </div>
            <button class="cancel-post"><i class="fas fa-angle-up"></i></button>
        </div>
    </div>
    <!-- End Create Post -->

    <!-- javaScript -->
    <script>
        //  Create Post Event Click
        const createPost = document.querySelector(".create-post");
        const cancelPost = document.querySelector(".cancel-post");
        createPost.onclick = function() {
            document.querySelector(".post").style.height = "800px";
            cancelPost.style.display = "block";
        };
        // cancel post
        cancelPost.addEventListener("click", () => {
            document.querySelector(".post").style.height = "80px";
            cancelPost.style.display = "none";
        });
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
