<x-app-layout>
    <x-slot name="header">
        {{ __('Liste des catégories') }}
    </x-slot>

    <div class="flex justify-end mb-4">
        <a href="{{ route('categories.create')  }}" class="inline-block">
            <x-primary-button>Créer une catégorie</x-primary-button>
        </a>
    </div>

{{--    <div class="mb-4 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md">--}}
{{--        <div class="flex justify-center items-center w-12 bg-blue-500">--}}
{{--            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>--}}
{{--            </svg>--}}
{{--        </div>--}}

{{--        <div class="px-4 py-2 -mx-3">--}}
{{--            <div class="mx-3">--}}
{{--                <span class="font-semibold text-blue-500">Info</span>--}}
{{--                <p class="text-sm text-gray-600">Sample table page</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

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
                    Prenom
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $categorie->id }}</p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $categorie->libelle }}</p>
                    </td>

                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-x-2">
                        <a href="{{route('users.edit', $categorie->id)}}"><button class="text-blue-900">Editer</button></a>
                        <form action="{{route('users.destroy', $categorie->id)}}" method="POST" class="inline">
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
            {{ $categories->links() }}
        </div>
    </div>

</x-app-layout>
