<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Group') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('groups.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="group_name"
                        field="group_name"
                        placeholder="Group Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('group_name')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="group_time"
                        field="group_time"
                        placeholder="time"
                        class="w-full mt-6"
                        :value="@old('group_time')"></x-text-input>

                        <x-text-input
                        type="text"
                        name="group_date"
                        field="group_date"
                        placeholder="date..."
                        class="w-full mt-6"
                        :value="@old('group_date')"></x-text-input>

                    <!-- I created a new component called textarea -->
                    <x-textarea
                        name="group_type"
                        rows="10"
                        field="group_type"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('group_type')">
                    </x-textarea>

                    <x-file-input
                        type="file"
                        name="group_image"
                        placeholder="Group"
                        class="w-full mt-6"
                        field="group_image"
                        :value="@old('group_image')">>
                    </x-file-input>

                    <x-primary-button class="mt-6">Save Book</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
