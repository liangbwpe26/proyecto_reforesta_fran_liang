<nav x-data="{ open: false }" class="bg-white shadow-lg sticky top-0 z-50 border-b-4 border-green-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20"> <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('inicio') }}" class="text-2xl font-black text-green-700 tracking-tight">
                        Reforesta
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('especies.index')" :active="request()->routeIs('especies.*')">
                        {{ __('Nuestras Especies') }}
                    </x-nav-link>
                    <x-nav-link :href="route('logros.index')" :active="request()->routeIs('logros.index')">
                        {{ __('Logros') }}
                    </x-nav-link>

                    @auth
                        @if(Auth::user()->is_admin ?? false)
                            <x-nav-link :href="route('admin.eventos')" :active="request()->routeIs('admin.eventos')" class="text-red-600 font-bold">
                                {{ __('Panel Admin') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-gray-700 bg-white hover:text-green-600 focus:outline-none transition ease-in-out duration-150">
                                <div class="flex items-center gap-3">
                                    <div class="shrink-0">
                                        @if(Auth::user()->avatar)
                                            <img class="h-10 w-10 rounded-full object-cover border-2 border-green-500 shadow-sm" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->nick }}">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center border-2 border-green-500 text-green-700 text-xs font-bold shadow-sm">
                                                {{ substr(Auth::user()->nick ?? Auth::user()->name, 0, 2) }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="text-left">
                                        <div class="text-[10px] uppercase tracking-wider text-gray-500 font-extrabold">Karma: {{ Auth::user()->karma ?? 0 }}</div>
                                        <div class="font-bold text-gray-900 leading-tight">{{ Auth::user()->nick ?? Auth::user()->name }}</div>
                                    </div>
                                </div>

                                <div class="ms-2">
                                    <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Mi Perfil') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700 hover:text-green-600 transition">Entrar</a>
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-5 py-2.5 rounded-xl text-sm font-extrabold hover:bg-green-700 shadow-md transition transform hover:-translate-y-0.5">Registro</a>
                    </div>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-200 shadow-inner">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('especies.index')" :active="request()->routeIs('especies.*')">
                {{ __('Nuestras Especies') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('logros.index')" :active="request()->routeIs('logros.index')">
                {{ __('Logros') }}
            </x-responsive-nav-link>
        </div>

        @auth
            <div class="pt-4 pb-1 border-t border-gray-200 bg-gray-50">
                <div class="flex items-center px-4">
                    <div class="shrink-0">
                        @if(Auth::user()->avatar)
                            <img class="h-12 w-12 rounded-full object-cover border-2 border-green-500" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->nick }}">
                        @else
                            <div class="h-12 w-12 rounded-full bg-green-200 flex items-center justify-center border-2 border-green-500 text-green-800 font-bold">
                                {{ substr(Auth::user()->nick ?? Auth::user()->name, 0, 2) }}
                            </div>
                        @endif
                    </div>
                    <div class="ms-3">
                        <div class="font-bold text-base text-gray-800">{{ Auth::user()->nick ?? Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Mi Perfil') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
