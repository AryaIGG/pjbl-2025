<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="/posts/{{ $post->id }}" method="POST" class="max-w-xl space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title', $post->title) }}">
        </div>

        <div>
            <label class="block mb-1 font-medium">Slug</label>
            <input type="text" name="slug" class="w-full border rounded p-2" value="{{ old('slug', $post->slug) }}">
        </div>

        <div>
            <label class="block mb-1 font-medium">Author</label>
            <select name="author_id" class="w-full border rounded p-2">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" 
                        {{ old('author_id', $post->author_id) == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Category</label>
            <select name="category_id" class="w-full border rounded p-2">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Body</label>
            <textarea name="body" class="w-full border rounded p-2" rows="8">{{ old('body', $post->body) }}</textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Post</button>
    </form>
    <a href="/posts" class="inline-block mt-4 text-gray-600 hover:underline">&larr; Back to Posts</a>
</x-layout>
