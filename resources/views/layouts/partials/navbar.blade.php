@php
use App\Models\Categories;
use App\Models\User;
$types = Categories::all();
$user = User::where('id', auth()->id())->first();
$userPref = json_decode($user->cat_pref, true);

@endphp


<nav class="navbar">
    <a href="/">
        <h1 class="logo">WebWire Tribune</h1>
    </a>
    <div class="nav-item">
        <li><a href="/">Home</a></li>

        @auth
        @if($userPref)
        @for($i=0; $i< count($userPref['data']) ; $i++) <li><a href={{route($types[$userPref['data'][$i]]->route)}}>{{$types[$userPref['data'][$i]]->name}}</a></li>
            @endfor
            @else
            <li><a href="/category">Category</a></li>
            @endif
            @endauth
            @guest
            <li><a href="/category">Category</a></li>
            @endguest
            <li><a href="/contactus">Contact us</a></li>
    </div>

    <div class="navbar-side">
        <form class="serach-form">
            <input type="search" class="form-control search-bar" placeholder="Search..." aria-label="Search">
        </form>

        @auth
        <a href="{{route("home.profile", ['id' => auth()->id()] )}}" class="user">{{ auth()->user()->name }}</a>

        <li><a href="{{ route('logout.perform') }}">Logout</a></li>
        @endauth

        @guest
        <li><a href="{{ route('login.perform') }}">Login</a></li>
        <li><a href="{{ route('register.perform') }}">Signup</a></li>
        @endguest
    </div>
</nav>
