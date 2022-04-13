<!-- Responsive navbar-->
<header class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 rounded-0 ">
        <div class="container flex justify-between items-center">
            <a class="navbar-brand flex align-items-center h-auto gap-5" href="{{route('home')}}">
                <img src="{{asset('image/logo.png')}}" class="w-16 h-16 " alt="">
                <span>Camping review</span>
            </a>
            <div class="collapse navbar-collapse float-sm-right" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pl-5 flex items-center ">
                    <li class="nav-item"><a class="nav-link text-2xl" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-2xl" href="{{route('post.all')}}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link text-2xl" href="{{route('contact')}}">Contact</a></li>
                    </li>

                </ul>
            </div>
            <form action="{{route('post.all')}}" class="mr-8">
                <div class="relative flex items-center text-gray-600 ">
                    <input type="search" name="keyword" placeholder="Search"
                           class="bg-white py-2 px-4  rounded-full text-2xl focus:outline-none">
                    <button type="submit" class="absolute right-0 top-50 text-xl mr-3 ">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <div class=" flex justify-end" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto flex items-center">
                    <!-- Authentication Links -->

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item mr-8"><a
                                class="nav-link bg-blue-500 text-white font-semibold hover:bg-blue-600 rounded px-4 py-3"
                                href="{{route('post.new')}}">Create new post</a></li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle flex items-center" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img
                                    src="{{asset('/storage/image/users/avatar/'.Auth::user()->avatar) }}"
                                    alt="User Avatar" class="  img-circle avatar-img w-12 h-12">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right rounded p-0" aria-labelledby="navbarDropdown">
                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                    <a class="dropdown-item py-3 border-bottom"
                                       href="{{route('dashboard')}}">
                                        Admin
                                    </a>
                                @endif
                                <a class="dropdown-item py-3 border-bottom"
                                   href="{{route('post.publish',Auth::user()->url_key)}}">
                                    My Posts
                                </a>
                                <a class="dropdown-item py-3 border-bottom"
                                   href="{{route('post.collections',Auth::user()->url_key)}}">
                                    My Collections
                                </a>
                                <a class="dropdown-item py-3 border-bottom"
                                   href="{{route('profile',Auth::user()->url_key)}}">
                                    Profile
                                </a>
                                <a class="dropdown-item py-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

        </div>

    </nav>
</header>
<!-- Page header with logo and tagline-->
