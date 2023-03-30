<head><link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></head>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  " >
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                   
                </div>
                
                
                
                <!-- Navigation Links -->
                

                    <div class="container text-left row-flex justify-content-between py-3" style="gap:50px; margin-left: 30px;">
                        <div class="row w-70">
                           <div class="col">
                            <a style="text-decoration:none; color:black; font-size:20px"  href="/posts">Posts</a>
                           </div>
                           <div class="col">
                            <a style="text-decoration:none; color:black; font-size:20px"  href="/projects">Projecten</a>
                           </div>
                           
                            
                           
                        </div>
                      
                        </div>
                        <h3 class="offset-7 cursor-pointer mt-3 position-absolute"><a href="{{route("admin.index")}}" style="text-decoration:none; color:black; font-size:24px">Admin</a></h3>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6" style="margin-left:890px">
                
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex  items-center px-3 mb-1 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>@if(Auth::check()){{ Auth::user()->name }}</div>@if(Auth::user()->image != "preset.png")<img src="{{url("images/preset.png")}}" width="50" height="50"> @else <img src="{{url("images/".Auth::user()->id."/".Auth::user()->user_image)}}" width="50" height="50" alt="">@endif @else  @endif

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    
                   
                    <x-slot name="content">
                            @guest
                            <x-dropdown-link :href="route('login')">
                                {{ __('Inloggen') }}
                            </x-dropdown-link>
                            @endguest
                            
                            @guest
                            <!-- Authentication -->
                            <x-dropdown-link :href="route('register')">
                                {{ __('Registreren') }}
                            </x-dropdown-link>
                            @endguest
                            
                            @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Uitloggen') }}
                                </x-dropdown-link>
                            </form>
                            @endauth
                            
                        </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">@if(Auth::check()){{ Auth::user()->name }}</div>@else @endif
                <div class="font-medium text-sm text-gray-500">@if(Auth::check()){{ Auth::user()->email }}</div>@else @endif
            </div>
            
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
