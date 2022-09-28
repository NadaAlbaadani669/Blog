<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Create Post</h1>

            <form method="POST" action="/admin/posts" enctype="multipart/form-data" class="mt-10">
                @csrf
                    <div class="mb-6">
                        <label for="title" class="block mb-2 uppercase fond-bold text-xs text-gray-700">Title</label>
                        <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="title" id="title" value="{{ old('title') }}" required><br>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="slug" class="block mb-2 uppercase fond-bold text-xs text-gray-700 ">Slug</label>
                        <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="slug" id="slug" value="{{ old('slug') }}" required><br>
                        @error('slug')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="thumbnail" class="block mb-2 uppercase fond-bold text-xs text-gray-700 ">Thumbnail</label>
                        <input class="border border-gray-400 p-2 w-full rounded-xl" type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail') }}" required><br>
                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <label for="excerpt" class="block mb-2 uppercase fond-bold text-xs text-gray-700">Excerpt</label>
                        <textarea name="excerpt" class="p-2 w-full text-xs focus:outline-none focus:ring border border-gray-400 rounded-xl" rows="10" required>{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <label for="body" class="block mb-2 uppercase fond-bold text-xs text-gray-700">Body</label>
                        <textarea name="body" class="p-2 w-full text-xs focus:outline-none focus:ring border border-gray-400 rounded-xl" rows="10" required>{{ old('body') }}</textarea>
                        @error('body')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <label for="category" class="p-2 block mb-2 uppercase fond-bold text-xs text-gray-700">Category</label>
                        <select name="category_id" id="category_id" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                            @php $categories  = \App\Models\Category::all(); @endphp
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                            @endforeach
                        </select>
                        @error('body')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-6 mt-4">
                        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-500" type="submit">Create</button>
                    </div>


                </div>

            </form>
        </main>
    </section>

</x-layout>
