<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="mb-8">
        <p class="text-[10px] font-medium tracking-[0.32em] uppercase text-[#8A837A]">
            Área privada
        </p>

        <h1
            class="mt-3 text-4xl font-normal text-[#171715]"
            style="font-family: 'Playfair Display', serif;"
        >
            Bienvenido
        </h1>

        <p class="mt-3 text-sm leading-6 text-[#6F6A64]">
            Ingresa tus datos para acceder a tu cuenta.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Correo electrónico -->
        <div>
            <label
                for="email"
                class="block mb-2 text-[10px] font-medium tracking-[0.2em] uppercase text-[#5A554F]"
            >
                Correo electrónico
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                class="block w-full border-0 border-b border-[#BDB5AA] bg-transparent px-0 py-3 text-sm text-[#171715] focus:border-[#5A4030] focus:ring-0"
            >

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-7">
            <label
                for="password"
                class="block mb-2 text-[10px] font-medium tracking-[0.2em] uppercase text-[#5A554F]"
            >
                Contraseña
            </label>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="block w-full border-0 border-b border-[#BDB5AA] bg-transparent px-0 py-3 text-sm text-[#171715] focus:border-[#5A4030] focus:ring-0"
            >

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordarme -->
        <div class="mt-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded-sm border-[#A7A198] text-[#5A4030] shadow-none focus:ring-[#5A4030]"
                >

                <span class="ms-2 text-xs text-[#6F6A64]">
                    Recordarme
                </span>
            </label>
        </div>

        <div class="mt-8 flex flex-col gap-6">
            <button
                type="submit"
                class="w-full bg-[#171715] px-6 py-4 text-[10px] font-medium tracking-[0.28em] uppercase text-[#F4F1EB] transition hover:bg-[#5A4030]"
            >
                Iniciar sesión
            </button>

            @if (Route::has('password.request'))
                <a
                    class="text-center text-xs text-[#6F6A64] underline underline-offset-4 transition hover:text-[#5A4030]"
                    href="{{ route('password.request') }}"
                >
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>