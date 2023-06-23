<x-app-layout>
    <x-slot name="header">
        {{ __('Liste des employés du restaurant') }}
    </x-slot>

    <div class="flex justify-end mb-4">
        <a  class="inline-block" href="{{ route('users.create')}}">
            <x-primary-button>Créer un employé</x-primary-button>
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
                    Nom
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Prenom
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Sexe
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Contact
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Email
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Role
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->id }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->nom }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->prenom }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->sexe }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->contact }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->email }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="whitespace-no-wrap text-center px-1 py-.5 rounded-full bg-amber-100 text-amber-800">{{ $user->getRoleNames()[0] }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-x-2">
                        <a href="{{route('users.edit', $user->id)}}"><button class="text-blue-900">Editer</button></a>
                        <form action="{{route('users.destroy', $user->id)}}" method="POST" class="inline">
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
            {{ $users->links() }}
        </div>
    </div>

</x-app-layout>
