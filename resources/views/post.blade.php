<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article class="py-8 max-w-screen-md">

        <h2 class="mb-2 text-2xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>

        <div>
            By
            <a href="/authors/{{ $post->author->username }}"
                class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}"
                class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a>
            | Posted in {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">{{ $post['body'] }}</p>
            <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to Blog</a>
    </article>

</x-layout>
