<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">From the blog
                </h2>
                <p class="mt-2 text-lg/8 text-gray-600">Learn how to grow your business with our expert advice.</p>
            </div>
            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:divide-x lg:divide-gray-200">
                @foreach ($posts as $index => $post)
                    @if ($index === 3)
                        <div class="col-span-full border-t border-gray-200 my-4"></div>
                    @endif
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ $post->created_at }}" class="text-gray-500">
                                {{ $post->created_at->diffForHumans() }}
                            </time>
                            <a href="/categories/{{ $post->category->slug }}"
                                class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                {{ $post->category->name }}
                            </a>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                <a href="/posts/{{ $post->slug }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">
                                {{ Str::limit($post->body, 150) }}
                            </p>
                        </div>
                        <div class="relative mt-8 flex items-center gap-x-4">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->author->name) }}&background=random&color=fff"
                                alt="{{ $post->author->name }}" class="size-10 rounded-full bg-gray-50">

                            <div class="text-sm/6">
                                <p class="font-semibold text-gray-900">
                                    <a href="/authors/{{ $post->author->username }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->author->name }}
                                    </a>
                                </p>
                                <p class="text-gray-600">{{ $post->author->email }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach

                <!-- More posts... -->
            </div>
        </div>
    </div>

</x-layout>
