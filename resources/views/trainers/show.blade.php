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
                                <img src="{{asset('storage/images/' . $trainer->trainer_image) }}" width="150" />
                            </td>
                            </tr>
                            <tr>
                                <td class="font-bold ">First Name  </td>
                                <td>{{ $trainer->first_name }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">Last Name </td>
                                <td>{{ $trainer->last_name }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Age </td>
                                <td>{{ $trainer->age }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <x-primary-button><a href="{{route('trainers.edit', $trainer) }}">Edit</a> </x-primary-button>
                    <form action="{{ route('trainers.destroy', $trainer) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
