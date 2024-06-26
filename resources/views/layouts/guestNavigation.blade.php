<head><link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></head>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 pt-3 pb-3 fs-5 ">
    <!-- Primary Navigation Menu -->
                <!-- Logo -->
                
                
                
                <!-- Navigation Links -->
                

                    
            <div class="container g-0 d-flex justify-content-between items-center">
                
                        <div class="col-4 d-flex justify-content-between">

                            <a href="/">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            </a>
                            <a style="text-decoration:none; color:black; font-size:20px"  href="/posts">Posts</a>
                            <a style="text-decoration:none; color:black; font-size:20px"  href="/projects">Projecten</a>
                            <a style="text-decoration:none; color:black; font-size:20px"  href="/categories">Categorieen</a>
                            <a style="text-decoration:none; color:black; font-size:20px"  href="/products">Producten</a>
                        </div>

                        @if(Auth::check() && Auth::user()->is_admin == 1)
                        <div class="col-5 text-right">
                            <h3 class="cursor-pointer  "><a href="{{route("admin.index")}}" style="text-decoration:none; color:black; font-size:24px">Admin</a></h3>
                        </div> 
                        <a href="{{route("cart")}}" class="fa-lg" style="color:black;"><i class="bi bi-cart3 fa-lg"></i></a>
                        @endif           
                        
                     
            <!-- Settings Dropdown -->
           
            <div class="col-1 g-0">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex  items-center px-3 mb-1 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>@if(Auth::check()){{ Auth::user()->name }}</div>@else @endif

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

                            <x-dropdown-link :href="route('users.profile.index')">
                                {{ __('Mijn profiel') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('users.projects.index')">
                                {{ __('Mijn projecten') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('users.posts.index')">
                                {{ __('Mijn posts') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('users.tasks.index')">
                                {{ __('Mijn taken') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('users.orders.overview')">
                                {{ __('Bestellingen') }}
                            </x-dropdown-link>
                           
                           

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
            <div class="px-4">@if(Auth::check())
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @else @endif
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
    </div>
</div>
</nav>