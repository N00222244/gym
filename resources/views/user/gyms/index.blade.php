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

            

            @forelse ($gyms as $gym)
                <x-card>

                        <a href="{{ route('admin.gyms.show', $gym) }}" class="font-bold text-2xl">{{ $gym->name }}</a>

                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $gym->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Name:</span> {{ $gym->name }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Address:</span> {{ $gym->address }}
                        </p>

                </x-card>
            @empty
                <p>No gyms</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
