<x-app-layout title="Project">
    <x-container>


        <div class="mb-7 justify-between flex items-center">
            <div>
                <h1 class="text-2xl font-semibold text-gray-700">Projects</h1>
                <p class=" font-light text-gray-600">Create and Control your Projects</p>
            </div>
            <div>
                <a href="{{ route('project.create') }}"
                    class="text-white  bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create</a>
            </div>


        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Project Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created_at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($projects as $project)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $i++ }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $project->title }}
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($project->categories as $category)
                                    <span class="border rounded px-1 py-1 text-xs">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $project->created_at->toFormattedDateString() }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('project.edit', $project->slug) }}"
                                    class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>

                                <button type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    onclick="destroyProject({{ $project->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-container>

    <script type="text/javascript">
        function destroyProject(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id)
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('project.destroy', ' + id + ') }}",
                        data: {
                            id_project: id
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Your work has been saved",
                                    showConfirmButton: false,
                                    timer: 1000
                                });

                            }

                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);

                        }
                    });


                }
            });
        }
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



        });
    </script>



</x-app-layout>
