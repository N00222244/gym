<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- alert-success is a component I created to display a success message that may be sent from the controller.
            For example, when a publisher is deleted, a message like "Publisher Deleted Successfully" will be displayed -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <x-primary-button>
                <a href="{{ route('admin.members.create') }}">Add a gym</a>
            </x-primary-button>

            @foreach ($members as $member)
                <x-card>

                        <a href="{{ route('admin.members.show', $member) }}" class="font-bold text-2xl">{{ $member->first_name }}</a>

                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $member->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Name:</span> {{ $member->last_name }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Address:</span> {{ $member->email }}
                        </p>

                </x-card>
            @empty
                <p>No members</p>
            @endforeach

        </div>
    </div>
</x-app-layout>

{{-- <x-app-layout>
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
            @forelse ($members as $member)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl"> <strong>member Name: <strong>
                    <a href="{{ route('admin.members.show', $member) }}">{{ $member->member_name }}</a>
                    </h2>
                    <p class="mt-2">




                        <h3 class="font-bold text-1x1"> <strong>Gym Name: </strong>{{$member->gym->name}} </h3>
                        <h3 class="font-bold text-1x1"> <strong>member Time: </strong>{{$member->member_time}} </h3>
                        <h3 class="font-bold text-1x1"> <strong>member Date: </strong>{{ $member->member_date }} </h3>
                        <h3 class="font-bold text-1x1"> <strong>member Type: </strong>{{$member->member_type}} </h3>
                        <h3 class="font-bold text-1x1"> <strong>member Image: </strong>{{$member->member_image}} </h3>



                        @if ($member->member_image)
                        <img src="{{ asset($member->member_image) }}"
                        alt="{{ $member->member_name }}" width="100">
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
 --}}
