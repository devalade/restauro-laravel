<x-app-layout>
    <x-slot name="header">
        {{ __('Liste des différents statuts de table') }}
    </x-slot>

    <div class="flex justify-end mb-4">
        <a href="{{ route('statut_tables.create')  }}" class="inline-block">
            <x-primary-button>Créer un statut</x-primary-button>
        </a>
    </div>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    ID
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Libellé
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($statutTables as $statutTable)
                <tr>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $statutTable->id }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $statutTable->libelle }}</p>
                    </td>

                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-x-2">
                        <a href="{{route('statut_tables.edit', $statutTable->id)}}"><button class="text-blue-900">Editer</button></a>
                        <form action="{{route('statut_tables.destroy', $statutTable->id)}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-800">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
            {{ $statutTables->links() }}
        </div>
    </div>

</x-app-layout>
