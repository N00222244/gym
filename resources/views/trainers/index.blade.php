<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Trainers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{session('success')}}
            </x-alert-success>

            <a href="{{ route('trainers.create') }}" class="btn-link btn-lg mb-2">Add a Trainer</a>
            @forelse ($trainers as $trainer)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('trainers.show', $trainer) }}">{{ $trainer->first_name }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $trainer->last_name }}
                        {{$trainer->age}}


                        @if ($trainer->trainer_image)
                        <img src="{{ asset($trainer->trainer_image) }}"
                        alt="{{ $trainer->trainer_name }}" width="100">
                    @else
                        No Image
                    @endif
                    </p>

                </div>
            @empty
            <p>No Trainers</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
