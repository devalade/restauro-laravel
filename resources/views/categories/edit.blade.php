<x-app-layout>
    <x-slot name="header">
        {{ __('Modifier une catégorie') }}
    </x-slot>



    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{route('categories.update', $categorie)}}" method="POST">
            @method('PATCH')
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                    <div>
                        <x-input-label for="nom" :value="__('Nom')"/>
                        <x-text-input type="text"
                                 name="libelle"
                                 id="libelle"
                                 value="{{ old('libelle') ?? $categorie->libelle }}"
                                 required
                        />
                        <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
                    </div>
                </div>
            <x-primary-button>Modifier une catégorie</x-primary-button>
        </form>

    </div>

</x-app-layout>
