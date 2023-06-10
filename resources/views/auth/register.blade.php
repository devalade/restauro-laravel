<x-guest-layout>
    <a href="/" class="flex justify-center items-center">
        <x-application-logo class="w-20 h-20 text-gray-500 fill-current"/>
    </a>

    <form method="POST" action="{{ route('register') }}">
    @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nom" :value="__('Nom')"/>
            <x-text-input type="text"
                     name="nom"
                     id="nom"
                     value="{{ old('nom') }}"
                     required
                     autofocus
            />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="prenom" :value="__('Prenom')"/>
            <x-text-input type="text"
                     name="prenom"
                     id="prenom"
                     value="{{ old('prenom') }}"
                     required
                     autofocus
            />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="sexe" :value="__('Sexe')"/>
            <x-text-input type="text"
                     name="sexe"
                     id="sexe"
                     value="{{ old('sexe') }}"
                     required
                     autofocus
            />
            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="contact" :value="__('Contact')"/>
            <x-text-input type="text"
                     name="contact"
                     id="contact"
                     value="{{ old('contact') }}"
                     required
                     autofocus
            />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input type="email"
                     name="email"
                     id="email"
                     value="{{ old('email') }}"
                     required/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input type="password"
                     name="password"
                     id="password"
                     required
                     autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
            <x-text-input type="password"
                     name="password_confirmation"
                     id="password_confirmation"
                     required
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col items-end mt-4">
            <x-primary-button class="w-full">
                {{ __('Register') }}
            </x-primary-button>

            <a class="mt-4 text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
