<x-app-layout>
    <x-slot name="header">
        {{ __('Modifier Utilisateur') }}
    </x-slot>

    

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{route('users.update', $user)}}" method="POST">
            @csrf
            @method('PATCH')
            @foreach ($roles as $role)
                <div class="mb-4">    
                    <input type="checkbox" class="form-checkbox mx-2" name="roles[]" value="{{$role->id}}" 
                    id="{{$role->id}}" @foreach ($user->roles as $userRole)
                        @if ($userRole->id == $role->id)
                            checked
                        @endif    
                    @endforeach>
                    <label class="inline-flex items-center" for="{{$role->id}}">{{$role->nom}}</label>
                </div>
            @endforeach
            <button class="bg-blue-500 text-white px-4 py-2 my-2 mx-2 rounded block" type="submit">Modifier les rôles</button>
        </form>
        
    </div>

</x-app-layout>
