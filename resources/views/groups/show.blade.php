<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{session('success')}}
            </x-alert-success>


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                          <tr>
                            <td rowspan="6">
                                <!-- use the asset function, access the file $group->group_image in the folder storage/images -->
                                <img src="{{asset('storage/images/' . $group->group_image) }}" width="150" />
                            </td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Title  </td>
                                <td>{{ $group->group_name }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">Description </td>
                                <td>{{ $group->group_time }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Category </td>
                                <td>{{ $group->group_type }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <x-primary-button><a href="{{route('groups.edit', $group) }}">Edit</a> </x-primary-button>
                    <form action="{{ route('groups.destroy', $group) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
