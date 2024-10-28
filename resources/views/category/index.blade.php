<x-app-layout title="Category">
    <x-container>

        <div class="mb-7 justify-between flex">
            <div>
                <h1 class="text-2xl font-semibold text-gray-700">Categories</h1>
                <p class=" font-light text-gray-600">Categories of Projects and Posts</p>
            </div>
            <div>
                <button data-modal-target="category-modal" data-modal-toggle="category-modal" type="button"
                    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create</button>
            </div>


        </div>

        <div class="table-category">

        </div>

    </x-container>


    <div id="category-modal" tabindex="-1" aria-hidden="true" "
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create Category
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="category-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d=" m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
    </svg>
    <span class="sr-only">Close modal</span>
    </button>
    </div>
    <!-- Modal body -->
    <div class="p-4 md:p-5 space-y-4">
        {{-- form --}}
        <div class=" mb-6 ">
            <div>
                <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                    name</label>
                <input type="text" id="category_name" name="category_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Technology" />
                <small class="text-red-500" id="errorCategory">

                </small>
            </div>
        </div>

        <button type="submit" id="btnCreateCategory"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>


    {{-- modal Edit --}}


    </div>
    </div>
    </div>



    <script type="text/javascript">
        $('#btnCreateCategory').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('category.store') }}",
                data: {
                    category_name: $('#category_name').val(),
                },
                dataType: "json",
                success: function(response) {


                    if (response.error) {
                        $('#errorCategory').html(response.error.category_name);
                    } else {


                        Swal.fire({
                            title: "Good job!",
                            text: response.success,
                            icon: "success"
                        });

                        $('#category_name').val('');
                        $('#errorCategory').html('');
                    }

                    tableCategory();


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + thrownError)
                }
            });
        });



        function tableCategory() {
            $.ajax({
                type: "GET",
                url: "{{ route('category.create') }}",
                dataType: "json",
                success: function(response) {
                    $('.table-category').html(response.data);
                }
            });
        }

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            tableCategory();


        });
    </script>

</x-app-layout>
