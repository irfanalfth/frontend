<div class="col-lg-12 m-auto">
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
    @if ($message = Session::get('info'))
        <div class="alert alert-info" role="alert">
            {{ $message }}
        </div>
    @endif
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
    @endif
    @if ($message = Session::get('secondary'))
        <div class="alert alert-secondary" role="alert">
            {{ $message }}
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endif
</div>
