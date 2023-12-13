<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Gyms') }}
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
                <a href="{{ route('admin.gyms.create') }}">Add a Publisher</a>
            </x-primary-button>

            @forelse ($gyms as $publisher)
                <x-card>

                        <a href="{{ route('admin.gyms.show', $publisher) }}" class="font-bold text-2xl">{{ $publisher->name }}</a>

                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $publisher->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Name:</span> {{ $publisher->name }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Address:</span> {{ $publisher->address }}
                        </p>

                </x-card>
            @empty
                <p>No Gyms</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
