<x-app-layout>
    <x-slot name="header">
        {{ __('Liste des Réservations') }}
    </x-slot>


    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    ID
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Nom 
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Table 
                </th>

                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->id }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->nom }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->table }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-x-2">
                        <form action="{{route('commandes.update', $user->id)}}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <input name="" class="sr-only" />
                            <button class="text-red-800">Editer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

{{--        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">--}}
{{--            {{ $users->links() }}--}}
{{--        </div>--}}
    </div>

</x-app-layout>
