<x-app-layout title="Edit Post">
    <x-container>
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit post</h2>

            <form action="{{ route('post.update', $post->slug) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirmUpdate()">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" 
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" 
                           required>
                </div>
                
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                              required>{{ old('description', $post->description) }}</textarea>
                </div>

                <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                    <textarea id="content" name="content" rows="4" required
                              class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                              placeholder="Edit your content...">{{ old('content', $post->content) }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label for="body_image" class="block text-gray-700 font-medium">Image</label>
                    <input type="file" id="body_image" name="body_image"
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none">
                    @if ($post->body_image)
                        <div class="mt-3">
                            <img src="{{ Storage::url($post->body_image) }}" alt="Post Image" class="w-32 h-32 object-cover rounded-md shadow-sm">
                        </div>
                    @endif
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                    Update post
                </button>
            </form>
        </div>
    </x-container>
</x-app-layout>

<script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update this post?");
    }
</script>
