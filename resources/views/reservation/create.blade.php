<x-app-layout>
    <x-slot name="header">
        {{ __('Créer une réservation') }}
    </x-slot>



    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{  route('réservations.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4 mb-4">
                <div>
                    <x-input-label for="nomclient" :value="__('Nom Client')"/>
                    <x-text-input type="text"
                                  name="nomclient"
                                  id="nomclient"
                                  value="{{ old('nomclient')}}"
                    />
                    <x-input-error :messages="$errors->get('nomclient')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="dateReservation" :value="__('Date Reservation')"/>
                    <x-text-input type="text"
                                  name="dateReservation"
                                  id="dateReservation"
                                  value="{{ old('dateReservation')}}"
                    />
                    <x-input-error :messages="$errors->get('dateReservation')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="heure" :value="__('Heure')"/>
                    <x-text-input type="text"
                                  name="heure"
                                  id="heure"
                                  value="{{ old('heure')}}"
                    />
                    <x-input-error :messages="$errors->get('heure')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="nombrePersonne" :value="__('nombre Personne')"/>
                    <x-text-input type="text"
                                  name="nombrePersonne"
                                  id="nombrePersonne"
                                  value="{{ old('nombrePersonne')}}"
                    />
                    <x-input-error :messages="$errors->get('nombrePersonne')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="prix" :value="__('Prix')"/>
                    <x-text-input type="text"
                                  name="prix"
                                  id="prix"
                                  value="{{ old('prix')}}"
                    />
                    <x-input-error :messages="$errors->get('prix')" class="mt-2" />
                </div>
                
                
            </div>
            <x-primary-button type="submit">Créer une réservation</x-primary-button>
        </form>



    </div>

</x-app-layout>
