<!DOCTYPE html>
<html lang="ar">

<head>
    <ta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" />
    <title>Company Name | تسجيل دخول</title>
</head>

<body>
    <div class="wrapper">
        <div class="form">
            <h1 class="title">Company Name</h1>
            <form method="POST" action="{{ url('/signin', []) }}">
                @csrf
                <input type="text" autofocus class="input" placeholder="الاسم || البريد || رقم الهاتف" name="emailOrPhoneOrName" required />
                <input type="password" class="input" placeholder="كلمة المرور" name="password" required />
                <div>
                    <button type="submit" class="button">
                        <span>تسجيل دخول</span>
                    </button>
                </div>
                <h2 class="error"></h2>
            </form>
        </div>
    </div>
</body>

</html>
