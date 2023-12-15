<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $gym->name }} - Groups
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <h3 class="font-bold text-2x1 mb-4">Gym Details</h3>
           <p class="text-gray-700"><span class="font bold">ID:</span> {{ $gym->id}}</p>
           <p class="text-gray-700"><span class="font bold">Name:</span> {{ $gym->name}}</p>
           <p class="text-gray-700"><span class="font bold">Address:</span> {{ $gym->address}}</p>

           <h3 class="font-bold text-2x1 mb-4">Classes in Gym {{$gym->address}}</h3>


            @forelse ($groups as $group)
                <x-card>
                        <a href="{{ route('admin.groups.show', $group) }}" class="font-bold text 2x1">{{$group->group_name}}</a>
                </x-card>
            @empty
                <p>No Groups in gym</p>
            @endforelse

        </div>
    </div>
</x-app-layout>

