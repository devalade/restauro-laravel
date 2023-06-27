<x-app-layout>
    <x-slot name="header">
        {{ __('Créer un plat') }}
    </x-slot>



    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{  route('plats.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4 mb-4">
                <div>
                    <x-input-label for="libelle" :value="__('Libelle')"/>
                    <x-text-input type="text"
                                  name="libelle"
                                  id="libelle"
                                  value="{{ old('libelle')}}"
                    />
                    <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')"/>
                    <x-text-input type="text"
                                  name="description"
                                  id="description"
                                  value="{{ old('description')}}"
                    />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="prix" :value="__('Prix')"/>
                    <x-text-input type="numeric"
                                  name="prix"
                                  id="prix"
                                  value="{{ old('prix')}}"
                    />
                    <x-input-error :messages="$errors->get('prix')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="categorie_id" :value="__('Categorie Plat')"/>
                    <select id="categorie_id" name="categorie_id" >
                        <option value=""></option>
                        @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('categorie_id')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="image" :value="__('Image')"/>
                    <input type="file" name="image" id="image">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>


            </div>
            <x-primary-button type="submit">Créer un plats</x-primary-button>
        </form>

    </div>

</x-app-layout>
