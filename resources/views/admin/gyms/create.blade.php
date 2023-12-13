<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.gyms.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title...."
                        class="w-full"
                        autocomplete="off"
                        :value="@old('title')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="category"
                        field="category"
                        placeholder="Category..."
                        class="w-full mt-6"
                        :value="@old('category')"></x-text-input>

                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <x-textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('description')">
                    </x-textarea>

                    <x-text-input
                    type="text"
                    name="isbn"
                    field="isbn"
                    placeholder="ISBN..."
                    class="w-full mt-6"
                    :value="@old('isbn')"></x-text-input>

                    <x-file-input
                        type="file"
                        name="book_image"
                        placeholder="Book"
                        class="w-full mt-6"
                        field="book_image">
                    </x-file-input>

                    <div class="mt-6">
                        <x-select-group name="group_id" :groups="$groups" :selected="old('group_id')"/>
                    </div>


                    <x-primary-button class="mt-6">Save Group</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
