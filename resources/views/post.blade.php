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
    <link rel="stylesheet" href="{{ asset('plugins/all.min.css') }}">
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- Css file -->
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}" />
    <title>Company name | الرسالة</title>
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
    <!-- Start Post -->
    <div class="posts-parent">
        <div class="content">
            <div id="posts-child">
                <div class="post-content">
                    <h4>{{ $post->creator_name }}</h4>
                    <span class="date-post">{{ $post->created_at }}</span>
                    <h5 class="post-text">{{ $post->title }}</h5>
                    <p class="post-text">{{ $post->content }}</p>
                    <a href="{{ url('/uploads', $post->img) }}">
                        <img class="" width="250px" src="{{ url('/uploads', $post->img) }}" alt="">
                    </a>
                    <hr>
                    @foreach ($post->Replies as $reply)
                        <div class="reply">
                            @if ($reply->User->id == auth()->user()->id)
                                <span class="user-comment2">{{ $reply->replier_name }}</span>
                            @else
                                <span class="user-comment">{{ $reply->replier_name }}</span>
                            @endif
                            @if ($reply->User->id == auth()->user()->id)
                                <p class="comment-post2">{{ $reply->reply_content }}</p>
                            @else
                                <p class="comment-post">{{ $reply->reply_content }}</p>
                            @endif
                            <a href="{{ url('/uploads', $reply->reply_img) }}">
                                <img width="250px" src="{{ url('/uploads', $reply->reply_img) }}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <form id="form" method="POST" action="{{ url('/reply', $post->id) }}" enctype="multipart/form-data">
        @csrf
        <button type="submit"><i class="fas fa-paper-plane"></i></button>
        <input type="text" name="reply_content" placeholder="الرد علي المنشور" />
        <input type="file" name="reply_img">
    </form>
    <!-- End Post -->
    <!-- javaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
