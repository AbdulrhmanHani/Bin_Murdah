@extends('layouts.laylout')
@section('title')
    لوحة تحكم الأدمن
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #563706">
                    <div class="card-header">المستخدمين</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $usersCnt }}</h5>
                            <a href="{{ url('/admin/admins', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #563706">
                    <div class="card-header">المندوبين</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $delegatesCnt }}</h5>
                            <a href="{{ url('/admin/delegates', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #622e14">
                    <div class="card-header">العملاء</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $customersCnt }}</h5>
                            <a href="{{ url('/admin/customers', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #6e2423">
                    <div class="card-header">المباشرين</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $directsCnt }}</h5>
                            <a href="{{ url('/admin/directs', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #6e2423">
                    <div class="card-header">مكانة المباشرين</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $standingsCnt }}</h5>
                            <a href="{{ url('/admin/standings', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #7c1935">
                    <div class="card-header">الرسائل</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $messagesCnt }}</h5>
                            <a href="{{ url('/admin/messages', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #84133e">
                    <div class="card-header">الرتب</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $ranksCnt }}</h5>
                            <a href="{{ url('/admin/ranks', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #84133e">
                    <div class="card-header">الملاحظات</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $notesCnt }}</h5>
                            <a href="{{ url('/admin/notes', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #84133e">
                    <div class="card-header">أنواع العملاء</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $typesCnt }}</h5>
                            <a href="{{ url('/admin/types', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #8b0e46">
                    <div class="card-header">الإستمرارية</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $continuesCnt }}</h5>
                            <a href="{{ url('/admin/continues', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: #940651">
                    <div class="card-header">المنشورات</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ $publicationsCnt }}</h5>
                            <a href="{{ url('/admin/publications', []) }}" class="btn btn-light">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-4 col-sm-2 text-center ">
                <div class="card text-white mb-3 bg-success">
                    <div class="card-header">الإشعارات</div>
                    <div class="card-body">
                        <div class="card-text">
                            <h5 class="pb-4"><strong>{{ $notificationsCnt }}</strong></h5>
                            <a href="{{ url('/admin/notify') }}" class="btn btn-light px-5 mx-5">إظهار</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
