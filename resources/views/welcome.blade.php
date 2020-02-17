<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.admin.head')
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Admin Panel</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                   href="#">{{isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email}}</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>

@include('includes.admin.footer')

</body>
</html>
