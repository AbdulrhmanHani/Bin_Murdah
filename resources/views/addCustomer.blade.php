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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Company name | إضافة عميل</title>
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


    <!-- Start Form -->
    <div class="form mb-5">
        <form class="add-customer" action="{{ url('/addCustomer') }}" method="POST">
            @csrf
            <h2>أضف بيانات العميل</h2>
            <label for="customer-name">اسم العميل:</label>
            <div>
                <input type="text" name="customerName" id="customer-name" />
                <label for="customer-type">نوع العميل:</label>
                <select name="customerType" id="customer-type">
                    @foreach ($types as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                    @endforeach

                </select>
                <label for="customer-continuity">استمرارية العميل:</label>
                <select name="customerContinue" id="customer-continuity">
                    @foreach ($continues as $continue)
                        <option value="{{ $continue->continue }}">{{ $continue->continue }}</option>
                    @endforeach
                </select>
                <label for="customer-rank">رتبة العميل:</label>
                <select name="customerRank" id="customer-rank">
                    @foreach ($ranks as $rank)
                        <option value="{{ $rank->rank }}">{{ $rank->rank }}</option>
                    @endforeach
                </select>
                <label for="delegate-name">المستخدم المسؤول:</label>
                <select name="delegate" id="delegate-name">
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <label for="delegate-name"> المندوب:</label>
                <select name="Delegate" id="delegate-name">
                    @foreach ($delegates as $delegate)
                        <option value="{{ $delegate->name }}">{{ $delegate->name }}</option>
                    @endforeach
                </select>

                <label for="NOTE">الملاحظة :</label>
                <select name="NOTE" id="NOTE">
                    @foreach ($notes as $note)
                        <option value="{{ $note->note }}">{{ $note->note }}</option>
                    @endforeach
                </select>
            </div>

            <div>



                <label for="direct-name"> اسم المباشر :</label>
                <input type="text" id="direct-name" name="directName" />

                <label for="Job-name">مكانة المباشر:</label>
                <select name="directStanding" id="Job-name">
                    @foreach ($standings as $standing)
                        <option value="{{ $standing->standings }}">{{ $standing->standings }}</option>
                    @endforeach
                </select>

                <div class="phones">
                    <label for="phone">رقم الجوال:</label>
                    <input name="phone1" type="tel" id="phone" />
                    <label for="phone">رقم اخر (اختياري):</label>
                    <input name="phone2" type="tel" id="phone" />
                    <label for="phone">رقم اخر (اختياري):</label>
                    <input name="phone3" type="tel" id="phone" />
                </div>
                <hr color="grey" />
                <div class="box--name"></div>
            </div>
            <label for="notes">ملاحظات:</label>
            <textarea class="pb-5" name="notes" id="notes" cols="30" rows="2"></textarea>
            <button type="submit" class="mt-5">حفظ البيانات</button>
        </form>
    </div>
    <!-- End Form -->
    <!-- javaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
