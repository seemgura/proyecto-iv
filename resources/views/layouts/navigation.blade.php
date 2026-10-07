<nav
    x-data="{ open: false, userMenu: false }"
    class="border-b border-[#D8D2C8] bg-[#F4F1EB]"
>
    <div class="mx-auto max-w-[1400px] px-6 lg:px-10">

        <div class="flex h-20 items-center justify-between">

            {{-- Identidad --}}
            <div class="flex items-center gap-12">

                <a href="{{ url('/') }}" class="group">
                    <div class="leading-none">
                        <span
                            class="block text-lg tracking-[0.28em] text-[#171715]"
                            style="font-family: 'Playfair Display', serif;"
                        >
                            INTEOFFICE
                        </span>

                        <span class="mt-1 block text-[7px] tracking-[0.34em] text-[#8A837A]">
                            ESPACIOS QUE INSPIRAN
                        </span>
                    </div>
                </a>

                {{-- Navegación escritorio --}}
                <div class="hidden md:flex items-center gap-8">

                    @auth
                        <a
                            href="{{ route('dashboard') }}"
                            class="relative py-7 text-[10px] font-medium tracking-[0.2em] uppercase
                            {{ request()->routeIs('dashboard')
                                ? 'text-[#171715]'
                                : 'text-[#817A72] hover:text-[#171715]' }}"
                        >
                            Panel

                            @if (request()->routeIs('dashboard'))
                                <span class="absolute bottom-0 left-0 h-px w-full bg-[#5A4030]"></span>
                            @endif
                        </a>
                    @endauth

                    <a
                        href="{{ url('/') }}"
                        class="py-7 text-[10px] font-medium tracking-[0.2em] uppercase text-[#817A72] transition hover:text-[#171715]"
                    >
                        Ver sitio
                    </a>

                </div>
            </div>


            {{-- Cuenta escritorio --}}
            <div class="relative hidden md:block">

                @auth

                    <button
                        @click="userMenu = !userMenu"
                        @click.outside="userMenu = false"
                        class="flex items-center gap-3 text-left"
                    >
                        <div>
                            <p class="text-[10px] font-medium tracking-[0.12em] text-[#171715]">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="mt-1 text-[8px] tracking-[0.16em] uppercase text-[#9A938A]">
                                Administrador
                            </p>
                        </div>

                        <svg
                            class="h-3 w-3 text-[#817A72]"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0l-4.25-4.51a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>


                    {{-- Dropdown --}}
                    <div
                        x-show="userMenu"
                        x-transition
                        x-cloak
                        class="absolute right-0 z-50 mt-5 w-60 border border-[#D8D2C8] bg-[#FAF8F4] p-2 shadow-sm"
                    >
                        <div class="border-b border-[#E2DDD5] px-4 py-4">
                            <p class="text-[9px] tracking-[0.18em] uppercase text-[#9A938A]">
                                Cuenta
                            </p>

                            <p class="mt-2 truncate text-xs text-[#5F5952]">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <a
                            href="{{ route('profile.edit') }}"
                            class="block px-4 py-4 text-[10px] tracking-[0.18em] uppercase text-[#5F5952] transition hover:bg-[#EEE9E1] hover:text-[#171715]"
                        >
                            Perfil
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="block w-full px-4 py-4 text-left text-[10px] tracking-[0.18em] uppercase text-[#5F5952] transition hover:bg-[#EEE9E1] hover:text-[#171715]"
                            >
                                Cerrar sesión
                            </button>
                        </form>
                    </div>

                @else

                    <a
                        href="{{ route('login') }}"
                        class="text-[10px] font-medium tracking-[0.2em] uppercase text-[#817A72] transition hover:text-[#171715]"
                    >
                        Iniciar sesión
                    </a>

                @endauth

            </div>


            {{-- Menú móvil --}}
            <button
                @click="open = !open"
                class="flex h-10 w-10 items-center justify-center md:hidden"
                aria-label="Abrir menú"
            >
                <div class="space-y-1.5">
                    <span
                        class="block h-px w-5 bg-[#171715] transition"
                        :class="{ 'translate-y-[7px] rotate-45': open }"
                    ></span>

                    <span
                        class="block h-px w-5 bg-[#171715] transition"
                        :class="{ 'opacity-0': open }"
                    ></span>

                    <span
                        class="block h-px w-5 bg-[#171715] transition"
                        :class="{ '-translate-y-[7px] -rotate-45': open }"
                    ></span>
                </div>
            </button>

        </div>
    </div>


    {{-- Navegación móvil --}}
    <div
        x-show="open"
        x-transition
        x-cloak
        class="border-t border-[#D8D2C8] bg-[#F4F1EB] md:hidden"
    >
        <div class="px-6 py-7">

            <div class="space-y-1">

                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="block border-b border-[#DED8CF] py-4 text-[10px] tracking-[0.2em] uppercase text-[#171715]"
                    >
                        Panel
                    </a>
                @endauth

                <a
                    href="{{ url('/') }}"
                    class="block border-b border-[#DED8CF] py-4 text-[10px] tracking-[0.2em] uppercase text-[#5F5952]"
                >
                    Ver sitio
                </a>

                @auth
                    <a
                        href="{{ route('profile.edit') }}"
                        class="block border-b border-[#DED8CF] py-4 text-[10px] tracking-[0.2em] uppercase text-[#5F5952]"
                    >
                        Perfil
                    </a>
                @endauth

            </div>


            <div class="mt-8">

                @auth

                    <p class="text-xs text-[#171715]">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="mt-1 text-[10px] text-[#8A837A]">
                        {{ Auth::user()->email }}
                    </p>

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                        class="mt-6"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="text-[10px] tracking-[0.2em] uppercase text-[#5A4030]"
                        >
                            Cerrar sesión
                        </button>
                    </form>

                @else

                    <a
                        href="{{ route('login') }}"
                        class="text-[10px] tracking-[0.2em] uppercase text-[#5A4030]"
                    >
                        Iniciar sesión
                    </a>

                @endauth

            </div>
        </div>
    </div>

</nav>