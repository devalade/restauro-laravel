<x-app-layout>
    <x-slot name="header">
        {{ __('Modifier un plat') }}
    </x-slot>



    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{  route('plats.update', $table) }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4 mb-4">
                <div>
                    <x-input-label for="libelle" :value="__('Libelle Plat')"/>
                    <x-text-input type="text"
                                  name="libelle"
                                  id="libelle"
                                  value="{{ old('libelle', $plat->libelle)}}"
                    />
                    <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')"/>
                    <x-text-input type="text"
                                  name="description"
                                  id="description"
                                  value="{{ old('description', $plat->description)}}"
                    />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="prix" :value="__('Prix')"/>
                    <x-text-input type="text"
                                  name="prix"
                                  id="prix"
                                  value="{{ old('prix', $plat->description)}}"
                    />
                    <x-input-error :messages="$errors->get('prix')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="image" :value="__('Image')"/>
                    <input type="file" name="image" id="image">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="categorie_id" :value="__('Categorie Plat')"/>
                    <select id="categorie_id" name="categorie_id" >
                        <option value=""></option>
                        @foreach($categories as $categorie)
                            <option @selected(old('statut_table_id', $plat->categorie_id) == $plat->id) value="{{ $categorie->id }}" {{ old('categorie_id')}}>{{ $categorie->libelle }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('categorie_id')" class="mt-2" />
                </div>
            </div>
            <x-primary-button type="submit">Modifier un plat</x-primary-button>
        </form>

    </div>

</x-app-layout>
