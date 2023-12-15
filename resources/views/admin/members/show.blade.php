<!-- resources/views/admin/publishers/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $member->name }} - Books by this Member
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Display publisher details -->

            <h3 class="font-bold text-2xl mb-4">Member Details</h3>
            <p class="text-gray-700"><span class="font-bold">ID:</span> {{ $member->id }}</p>
            <p class="text-gray-700"><span class="font-bold">FirstName:</span> {{ $member->first_name }}</p>
            <p class="text-gray-700"><span class="font-bold">lastname:</span> {{ $member->last_name }}</p>
            <p class="text-gray-700"><span class="font-bold">email:</span> {{ $member->email }}</p>
            <p class="text-gray-700"><span class="font-bold">phone:</span> {{ $member->phone_no }}</p>

            <!-- Display books for the publisher -->

            <h3 class="font-bold text-2xl mt-6 mb-4">Books by {{ $member->first_name }}</h3>

            @forelse ($members as $mwmber)
                <x-card>
                     <a href="{{ route('admin.member.show', $member) }}" class="font-bold text-2xl">{{ $member->first_name }}</a>

                </x-card>
            @empty
                <p>No groups for this author</p>
            @endforelse



            <x-primary-button><a href="{{route('admin.members.edit', $member) }}">Edit</a> </x-primary-button>
            <form action="{{ route('admin.members.destroy', $member) }}" method="post">
                @method('delete')
                @csrf
                <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete </x-primary-button>


        </div>
    </div>
</x-app-layout>
