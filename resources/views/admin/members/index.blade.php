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
