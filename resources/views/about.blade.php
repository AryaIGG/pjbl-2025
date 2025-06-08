<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto grid max-w-7xl gap-20 px-6 lg:px-8 xl:grid-cols-3">
            <div class="max-w-xl">
                <h2 class="text-3xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-4xl">
                    Our Top Authors
                </h2>
                <p class="mt-6 text-lg/8 text-gray-600">
                    We’re a dynamic group of individuals who love to write and share their knowledge.
                </p>
            </div>

            <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                @foreach ($authors as $author)
                    <li>
                        <div class="flex items-center gap-x-6">
                            <img class="size-16 rounded-full bg-gray-100"
                                src="https://ui-avatars.com/api/?name={{ urlencode($author->name) }}&background=random"
                                alt="{{ $author->name }}">
                            <div>
                                <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">
                                    <a href="/authors/{{ $author->username }}" class="hover:underline">
                                        {{ $author->name }}
                                    </a>
                                </h3>
                                <p class="text-sm/6 text-gray-500">Author</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>
