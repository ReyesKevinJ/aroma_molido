<x-layouts.admin>
    @section('title', 'Editar Usuario')
    @section('content')
    <h1 class="text-2xl font-bold mb-4">Usuario: {{$user->id}} - {{$user->name}} {{$user->last_name}}</h1>
    <form action="{{route('admin.users.update', $user->id)}}" class="flex justify-center" method="post">
        @csrf
        @method('PUT')


        <div class="relative bg-neutral-primary-soft max-w-xl w-full p-6 border border-default rounded-base shadow-xs">
            <div class="flex flex-col items-center">
                <img class="w-24 h-24 mb-6 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                    alt="Bonnie image" />
                <h5 class="mb-0.5 text-xl font-semibold tracking-tight text-heading">{{$user->name}}
                    {{$user->last_name}}
                </h5>
                <div class="grid grid-cols-2 justify-items-center gap-4 mt-4 w-full">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <p>{{$user->email}}</p>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                        <p>{{$user->phone}}</p>
                    </div>

                </div>
                <div class="flex mt-4 md:mt-6 gap-4  justify-between">
                    <button type="button"
                        class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Editar
                    </button>
                    <div class="">
                        <label for="role"></label>
                        <select name="role" id="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-base focus:ring-blue-500 focus:border-blue-500 block w-full p-auto">
                            <option value="customer" {{$user->role == 'customer' ? 'selected' : ''}}>Usuario</option>
                            <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Administrador</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </form>
    @endsection
</x-layouts.admin>