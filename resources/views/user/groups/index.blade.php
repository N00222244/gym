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

            
            @forelse ($groups as $group)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('groups.show', $group) }}">{{ $group->group_name }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $group->group_time }}
                        {{$group->group_type}}


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
