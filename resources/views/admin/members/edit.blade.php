<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.members.update', $member) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                        type="text"
                        name="first_name"
                        field="first_name"
                        placeholder="first_ame"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('first_name')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="last_name"
                        field="last_name"
                        placeholder="last_name"
                        class="w-full mt-6"
                        :value="@old('last_name')"></x-text-input>

                        <x-text-input
                        type="text"
                        name="email"
                        field="email"
                        placeholder="email..."
                        class="w-full mt-6"
                        :value="@old('email')"></x-text-input>

                    <!-- I created a new component called textarea -->
                    <x-textarea
                        name="phone_no"
                        rows="10"
                        field="phone_no"
                        placeholder="phone_no"
                        class="w-full mt-6"
                        :value="@old('phone_no')">
                    </x-textarea>

                    <x-textarea
                    name="address"
                    rows="10"
                    field="address"
                    placeholder="address"
                    class="w-full mt-6"
                    :value="@old('address')">
                </x-textarea>

                <x-text-input
                type="creditcard_no"
                name="creditcard_no"
                field="creditcard_no"
                placeholder="credtcard_no..."
                class="w-full mt-6"
                :value="@old('creditcard_no')"></x-text-input>

                    <div class="mt-6">
                        <x-select-group name="group_id" :groups="$groups" :selected="old('group_id')"/>
                    </div>

                    <x-primary-button class="mt-6">Save Member</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
