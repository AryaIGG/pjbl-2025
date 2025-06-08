<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="/posts" method="POST" class="max-w-xl space-y-4">
        @csrf
        <div>
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title') }}">
        </div>

        <div>
            <label class="block mb-1 font-medium">Slug</label>
            <input type="text" name="slug" class="w-full border rounded p-2" value="{{ old('slug') }}">
        </div>

        <div>
            <label class="block mb-1 font-medium">Author</label>
            <select name="author_id" class="w-full border rounded p-2">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Category</label>
            <select name="category_id" class="w-full border rounded p-2">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Body</label>
            <textarea name="body" class="w-full border rounded p-2" rows="8">{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Post</button>
        <div class="flex justify-between items-center">
            <a href="/posts" class="text-gray-600 hover:underline">&larr; Back to Posts</a>
        </div>
    </form>
</x-layout>
