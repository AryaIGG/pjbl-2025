<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="mb-6">
        <a href="/posts/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Create New Post
        </a>
    </div>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <a href="/posts/{{ $post->slug }}" class="hover:underline">
                <h2 class="mb-2 text-2xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>
            </a>
            <div>
                By
                <a href="/authors/{{ $post->author->username }}"
                    class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
                in
                <a href="/categories/{{ $post->category->slug }}"
                    class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a>
                | Posted in {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">{{ Str::limit($post->body, 160) }}</p>

            <div class="flex gap-3">
                <a href="/posts/{{ $post->slug }}" class="font-medium text-blue-500 hover:underline">
                    Read More &raquo;
                </a>
                <a href="/posts/{{ $post->id }}/edit" class="text-yellow-600 hover:underline">
                    Edit
                </a>
                <form action="/posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Are you sure want to delete this post?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">
                        Delete
                    </button>
                </form>
            </div>
        </article>
    @endforeach
</x-layout>
