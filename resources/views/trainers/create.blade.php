<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Trainer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('trainers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="first_name"
                        field="first_name"
                        placeholder="First Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('first_name')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="last_name"
                        field="last_name"
                        placeholder="Last Name"
                        class="w-full mt-6"
                        :value="@old('last_name')"></x-text-input>

                        <x-text-input
                        type="text"
                        name="age"
                        field="age"
                        placeholder="age..."
                        class="w-full mt-6"
                        :value="@old('age')"></x-text-input>





                    <x-file-input
                        type="file"
                        name="trainer_image"
                        placeholder="Trainer Image"
                        class="w-full mt-6"
                        field="trainer_image"
                        :value="@old('trainer_image')">>
                    </x-file-input>

                    <x-primary-button class="mt-6">Save Trainer</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
