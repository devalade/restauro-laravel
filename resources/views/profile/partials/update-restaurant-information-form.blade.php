<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations sur le restaurant') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour les informations de votre restaurant.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form id="form" method="post" action="{{ route('profile.restaurant.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nom" :value="__('Désignation')" />
            <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('designation', $user->restaurant->designation)" required autofocus autocomplete="nom" />
            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
        </div>

        <div>
            <x-input-label for="nom" :value="__('Description')" />
            <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('designation', $user->restaurant->description)" required autofocus autocomplete="nom" />
            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
        </div>

        <div>
            <x-input-label for="contact" :value="__('Contact')" />
            <x-text-input id="contact" name="contact" type="text" class="mt-1 block w-full" :value="old('contact', $user->restaurant->contact)" required autofocus autocomplete="contact" />
            <x-input-error class="mt-2" :messages="$errors->get('contact')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->restaurant->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button form="form" type="submit">{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Modifié.') }}</p>
            @endif
        </div>
    </form>
</section>
