<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Group') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.gyms.update', $gym) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name', $gym->name)"></x-text-input>

                    <x-text-input
                        type="text"
                        name="phone_no"
                        field="phone_no"
                        placeholder="phone_no"
                        class="w-full mt-6"
                        :value="@old('phone_no', $gym->phone_name )"></x-text-input>

                        <x-text-input
                        type="text"
                        name="address"
                        field="address"
                        placeholder="address"
                        class="w-full mt-6"
                        :value="@old('address', $gym->address)"></x-text-input>


                    <x-textarea
                        name="email"
                        rows="3"
                        field="email"
                        placeholder="email"
                        class="w-full mt-6"
                        :value="@old('email', $gym->email)">
                    </x-textarea>





                    <div class="mt-6">
                        <x-select-group name="group_id" :groups="$groups" :selected="old('group_id')"/>
                    </div>

                    <x-primary-button class="mt-6">Save Book</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
