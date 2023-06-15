<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 bg-white">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex font-bold items-center text-black">
                    <a href="{{ route('dashboard') }}">
                        Books tracker
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if ( !auth()->check() ||   Auth::user()->type =='normal'  )
                        <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                            Home
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center ">
                <div class="flex items-center gap-4 ">
                    @if ( auth()->check()   )
                    <div class="sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-transparent  focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    Profile
                                </x-dropdown-link>

                                @if(  Auth::user()->type == 'normal')
                                    <x-dropdown-link :href="route('show-favorites-recipes')">
                                        Favorite recipes
                                    </x-dropdown-link>
                                @endif

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                        <div class="sm:flex sm:gap-4">
                            <a
                                class="block rounded-md bg-orange px-5 py-2.5 text-sm font-medium text-white transition hover:bg-orange"
                                href="{{route('login')}}"
                            >
                                Login
                            </a>

                            <a
                                class="hidden rounded-md bg-white px-5 py-2.5 text-sm font-medium text-orange transition hover:text-orange/75 sm:block"
                                href="{{route('register')}}"
                            >
                                Register
                            </a>
                        </div>
                    @endif
                </div>
                <div class="block sm:hidden">
                    <button @click="open = !open" class="items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="block sm:hidden">
        <div :class="{'block': open, 'hidden': !open}" class="bg-black text-white">
            <div class="pt-2 pb-3 space-y-1 bg-white text-black m-[5%]">
                                
            @if ( !auth()->check() ||   Auth::user()->type =='normal'  )
                <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                    Home
                </x-responsive-nav-link>

            @auth
                <div class="mt-3 space-y-1 text-black">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        Profile
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('show-favorites-recipes')">
                        Favorite recipes
                    </x-responsive-nav-link>

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


            @endauth

            @elseif ( auth()->check() ||   Auth::user()->type !='normal'  )
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-responsive-nav-link>

            @endif
            </div>

            
        </div>
    </div>
</nav>


