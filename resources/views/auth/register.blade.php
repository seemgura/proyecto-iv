<x-guest-layout>
    <div class="mb-8">
        <p class="text-[10px] font-medium tracking-[0.32em] uppercase text-[#8A837A]">
            Nueva cuenta
        </p>

        <h1
            class="mt-3 text-4xl font-normal text-[#171715]"
            style="font-family: 'Playfair Display', serif;"
        >
            Registro
        </h1>

        <p class="mt-3 text-sm leading-6 text-[#6F6A64]">
            Crea una cuenta para acceder a InteOffice.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <label
                for="name"
                class="block mb-2 text-[10px] font-medium tracking-[0.2em] uppercase text-[#5A554F]"
            >
                Nombre
            </label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                class="block w-full border-0 border-b border-[#BDB5AA] bg-transparent px-0 py-3 text-sm text-[#171715] focus:border-[#5A4030] focus:ring-0"
            >

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Correo electrónico -->
        <div class="mt-7">
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
                autocomplete="new-password"
                class="block w-full border-0 border-b border-[#BDB5AA] bg-transparent px-0 py-3 text-sm text-[#171715] focus:border-[#5A4030] focus:ring-0"
            >

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar contraseña -->
        <div class="mt-7">
            <label
                for="password_confirmation"
                class="block mb-2 text-[10px] font-medium tracking-[0.2em] uppercase text-[#5A554F]"
            >
                Confirmar contraseña
            </label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                class="block w-full border-0 border-b border-[#BDB5AA] bg-transparent px-0 py-3 text-sm text-[#171715] focus:border-[#5A4030] focus:ring-0"
            >

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-9 flex flex-col gap-6">
            <button
                type="submit"
                class="w-full bg-[#171715] px-6 py-4 text-[10px] font-medium tracking-[0.28em] uppercase text-[#F4F1EB] transition hover:bg-[#5A4030]"
            >
                Crear cuenta
            </button>

            <a
                class="text-center text-xs text-[#6F6A64] underline underline-offset-4 transition hover:text-[#5A4030]"
                href="{{ route('login') }}"
            >
                ¿Ya tienes una cuenta? Inicia sesión
            </a>
        </div>
    </form>
</x-guest-layout>