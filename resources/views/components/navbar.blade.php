<nav class="flex justify-center border-b border-gray-500">
    <div class="container flex justify-between items-center">
        <a class="" href="{{ url('/') }}">
            <h1 class="text-3xl bg-yellow-500 p-2">SouqRida</h1>
        </a>

        <ul class="flex justify-between w-full mx-12">
            <a href="{{ route('home') }}"><li class="bg-blue-500 p-2 rounded text-white">Home</li></a>
            <a href="{{ route('profile') }}"><li class="bg-blue-500 p-2 rounded text-white">Profile</li></a>
            <a href="{{ route('product.create') }}"><li class="bg-blue-500 p-2 rounded text-white">Create Product</li></a>
            <a href="{{ route('user.create') }}"><li class="bg-blue-500 p-2 rounded text-white">Create User</li></a>
            <a href=""><li class="bg-blue-500 p-2 rounded text-white">Cart</li></a>
        </ul>

        <div class="collapse " id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="">
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
                    <li class="border-l border-gray-500 pl-6">
                        <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="" aria-labelledby="navbarDropdown">
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
