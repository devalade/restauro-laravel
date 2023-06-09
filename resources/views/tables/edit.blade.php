<x-app-layout>
    <x-slot name="header">
        {{ __('Modifier une table') }}
    </x-slot>



    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{  route('tables.update', $table) }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4 mb-4">
                <div>
                    <x-input-label for="numero_table" :value="__('Numéro table')"/>
                    <x-text-input type="number"
                                  name="numero_table"
                                  id="numero_table"
                                  value="{{ old('numero_table', $table->numero_table)}}"
                    />
                    <x-input-error :messages="$errors->get('numero_table')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="capacite" :value="__('Capacité')"/>
                    <x-text-input type="number"
                                  name="capacite"
                                  id="capacite"
                                  value="{{ old('capacite', $table->capacite)}}"
                    />
                    <x-input-error :messages="$errors->get('capacite')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="image" :value="__('Image')"/>
                    <input type="file" name="image" id="image">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="statut_table_id" :value="__('Statut Table')"/>
                    <select id="statut_table_id" name="statut_table_id" >
                        <option value=""></option>
                        @foreach($status as $status)
                            <option @selected(old('statut_table_id', $table->statut_table_id) == $status->id) value="{{ $status->id }}" {{ old('statut_table_id')}}>{{ $status->libelle }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('statut_table_id')" class="mt-2" />
                </div>
            </div>
            <x-primary-button type="submit">Modifier une table</x-primary-button>
        </form>

    </div>

</x-app-layout>
