<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{session('success')}}
            </x-alert-success>

            <a href="{{ route('admin.groups.create') }}" class="btn-link btn-lg mb-2">Add a Group</a>
            @forelse ($groups as $group)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl"> <strong>Group Name: <strong>
                    <a href="{{ route('admin.groups.show', $group) }}">{{ $group->group_name }}</a>
                    </h2>
                    <p class="mt-2">




                        <h3 class="font-bold text-1x1"> <strong>Gym Name: </strong>{{$group->gym->name}} </h3>
                        <h3 class="font-bold text-1x1"> <strong>Group Time: </strong>{{$group->group_time}} </h3>
                        <h3 class="font-bold text-1x1"> <strong>Group Date: </strong>{{ $group->group_date }} </h3>
                        <h3 class="font-bold text-1x1"> <strong>Group Type: </strong>{{$group->group_type}} </h3>
                        <h3 class="font-bold text-1x1"> <strong>Group Image: </strong>{{$group->group_image}} </h3>



                        @if ($group->group_image)
                        <img src="{{ asset($group->group_image) }}"
                        alt="{{ $group->group_name }}" width="100">
                    @else
                        No Image
                    @endif
                    </p>

                </div>
            @empty
            <p>No groups</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
