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
                <div class="glyphicon-align-left">
                    <a class="blog-header-logo text-dark" href="/">Laravel Project</a>
                </div>
                <div class="justify-content-end">
                    <a class="blog-header-logo text-dark" href="{{ url('/logout') }}">Log Out</a>
                </div>
            @endif
        </div>
    </header>
    <hr>
    <hr>
</div>

