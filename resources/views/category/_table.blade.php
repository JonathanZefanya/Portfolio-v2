<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Used
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
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
            @foreach ($categories as $category)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $i++ }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4 flex flex-col">
                        <span>
                            Post : {{ $category->posts->count() }}
                        </span>
                        <span>
                            Project : {{ $category->projects->count() }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->created_at->toFormattedDateString() }}
                    </td>

                    <td class="px-6 py-4">
                        <a href="{{ route('category.edit', $category->slug) }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>

                        <button type="button"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            onclick="destroyCategory({{ $category->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>


{{-- modal --}}










<script>
    function destroyCategory(id) {
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

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('category.destroy', ' + id + ') }}",
                    data: {
                        id_category: id
                    },
                    dataType: "json",
                    success: function(response) {

                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.success,
                                showConfirmButton: false,
                                timer: 1000
                            });
                        }

                        tableCategory();
                    }
                });


            }
        });
    }
</script>
