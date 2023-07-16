<!doctype html>
<html dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ttms</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="../public/vue.js"></script>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

    @vite('resources/css/app.css')

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{__('site.Time table management system')}}
                </a>
                
                

                <div class="" id="">
                    <!-- Left Side Of Navbar -->
                    

                    <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                        
                        <ul>
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
        
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
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
            @if (Auth::check() && Auth::user()->hasPermission('users-create'))
            <ul>
                <li><a href="{{route('user.index')}}"><span>{{__('site.users')}}</span></a></li>
            </ul>
            @endif
            
            <ul class="menu flex space-x-4 bg-white"> @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) <li> <a class="block py-2 px-4 rounded-md text-gray-800 hover:bg-gray-300 transition duration-300 ease-in-out" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }} </a> </li> @endforeach </ul>
        </nav>
        <nav class="flex bg-gray-900">
            <a href="/home" class="flex items-center justify-center py-4 px-6 text-gray-300 hover:text-white {{ (request()->routeIs('home')) ? 'text-white bg-gray-800' : '' }}">
                <span class="font-medium">{{__('site.Home')}}</span>
            </a>
            <a href="/tables/show" class="flex items-center justify-center py-4 px-6 text-gray-300 hover:text-white {{ (request()->routeIs('tables.show')) ? 'text-white bg-gray-800' : '' }}">
                <span class="font-medium">{{__('site.Time-tables')}}</span>
            </a>
            <a href="/rooms/show" class="flex items-center justify-center py-4 px-6 text-gray-300 hover:text-white {{ (request()->routeIs('rooms.show')) ? 'text-white bg-gray-800' : '' }}">
                <span class="font-medium">{{__('site.Rooms')}}</span>
            </a>
            <a href="/departments/show" class="flex items-center justify-center py-4 px-6 text-gray-300 hover:text-white {{ (request()->routeIs('departments.show')) ? 'text-white bg-gray-800' : '' }}">
                <span class="font-medium">{{__('site.Departments')}}</span>
            </a>
            <a href="/levels/show" class="flex items-center justify-center py-4 px-6 text-gray-300 hover:text-white {{ (request()->routeIs('levels.show')) ? 'text-white bg-gray-800' : '' }}">
                <span class="font-medium">{{__('site.Levels')}}</span>
            </a>
            <a href="/lecturers/show" class="flex items-center justify-center py-4 px-6 text-gray-300 hover:text-white {{ (request()->routeIs('lecturers.show')) ? 'text-white bg-gray-800' : '' }}">
                <span class="font-medium">{{__('site.Lecturers')}}</span>
            </a>
            <a href="/courses/show" class="flex items-center justify-center py-4 px-6 text-gray-300 hover:text-white {{ (request()->routeIs('courses.show')) ? 'text-white bg-gray-800' : '' }}">
                <span class="font-medium">{{__('site.Courses')}}</span>
            </a>
            <a href="/quorum/show" class="flex items-center justify-center py-4 px-6 text-gray-300 hover:text-white {{ (request()->routeIs('quorum.show')) ? 'text-white bg-gray-800' : '' }}">
                <span class="font-medium">{{__('site.Quorum-tables')}}</span>
            </a>
        </nav>
        <main class="py-4">
            <div>
             @yield('content')
            </div>
        </main>
    </div>
    @livewireScripts
</body>
</html>
