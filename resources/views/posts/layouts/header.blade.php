<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">

            @if(!Auth::check())
                <div class="col-4 pt-1">
                    <a class="btn btn-sm btn-outline-secondary" href="/register">Register</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="/">Laravel Project</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary" href="/login">Log In</a>
                </div>
            @else
                <div class="col-4 pt-1">
                    @if(auth()->user()->role_id == 1)<a class="btn btn-sm btn-outline-secondary" href="/admin">Visit Admin Panel</a>@endif
                    @if(auth()->user()->role_id == 2)<a class="btn btn-sm btn-outline-secondary" href="/author">Visit Author Panel</a>@endif
                    @if(auth()->user()->role_id == 3)<a class="btn btn-sm btn-outline-secondary" href="/">Welcome Subscriber</a>@endif
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="/">Laravel Project</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ url('/logout') }}">Log Out</a>
                </div>
            @endif
        </div>
    </header>
    <hr>
    <hr>
</div>

