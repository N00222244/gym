<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create gyms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.gyms.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name...."
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="phone_no"
                        field="phone_no"
                        placeholder="phone_no..."
                        class="w-full mt-6"
                        :value="@old('phone_no')"></x-text-input>

                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <x-textarea
                        name="address"
                        rows="3"
                        field="address"
                        placeholder="address..."
                        class="w-full mt-6"
                        :value="@old('address')">
                    </x-textarea>

                    <x-text-input
                    type="text"
                    name="email"
                    field="email"
                    placeholder="email..."
                    class="w-full mt-6"
                    :value="@old('email')"></x-text-input>




                    <div class="mt-6">
                        <x-select-group name="group_id" :groups="$groups" :selected="old('group_id')"/>
                    </div>


                    <x-primary-button class="mt-6">Save gym</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
