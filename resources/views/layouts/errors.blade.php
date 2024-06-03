@if ($errors->any())
    <div class="container text-center alert-danger">
        @foreach ($errors->all() as $error)
            <h5>*{{ $error }}</h5>
        @endforeach
    </div>
@endif
