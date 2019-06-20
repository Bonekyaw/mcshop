<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MC Shop') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="{{ url('/home') }}">
                    {{ config('app.name', 'MC Shop') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold " href="/categories">{{ __('မျိုးကွဲများ') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold " href="/brands">{{ __('တံဆိပ်များ') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold " href="/tags">{{ __('မျိုးတူရာတူရာ') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__('ထုတ်ကုန်များ') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item font-weight-bold" href="/products">
                                        {{ __('ပစ္စည်းစုံ') }}
                                    </a>
                                    <a class="dropdown-item font-weight-bold" href="/histories/outOfStock">
                                        {{ __('ကုန်တော့မည့်စာရင်း') }}
                                    </a>
                                    <a class="dropdown-item font-weight-bold" href="/histories">
                                        {{ __('ရောင်းပြီးစာရင်း') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__('အသစ်ထပ်ထည့်ခြင်း') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item font-weight-bold" href="/categories/create">
                                        {{ __('မျိုးကွဲသစ်') }}
                                    </a>
                                    <a class="dropdown-item font-weight-bold" href="/brands/create">
                                        {{ __('တံဆိပ်သစ်') }}
                                    </a>
                                    <a class="dropdown-item font-weight-bold" href="/tags/create">
                                        {{ __('မျိုးတူရာအစုသစ်') }}
                                    </a>
                                    <a class="dropdown-item font-weight-bold" href="/products/create">
                                        {{ __('ထုတ်ကုန်သစ်') }}
                                    </a>
                                </div>
                            </li>

                            @if (isset ($bellNoti) )                           
                                <li class="nav-item">
                                     <a class="nav-link font-weight-bold text-primary" href="/histories/outOfStock"><i class="fas fa-bell"></i><sup class="text-danger">{{$bellNoti}}</sup></a>
                                </li>
                            @endif


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                      <span class="sr-only">Loading...</span>
                                    </div>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

