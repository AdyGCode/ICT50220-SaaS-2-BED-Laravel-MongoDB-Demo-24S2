<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex flex-row gap-8">

                        <h2 class="text-lg grow">Posts</h2>
                            <x-primary-link-button href="{{ route('posts.create') }}">
                                New Post
                            </x-primary-link-button>
                    </div>

                    @if($message = Session::get('success'))
                        <div class="bg-green-500 p-4 rounded my-4 text-green-50">
                            {{$message}}
                        </div>
                    @endif

                    <section class="w-full table flex flex-col gap-4">
                        <header class="grid grid-cols-6 bg-gray-700 text-gray-100 -mx-6 px-6 py-2 mt-4">
                            <p class="col-span-3">Title</p>
                            <p class="col-span-2">Slug</p>
                            <p class="col-span-1">Actions</p>
                        </header>

                            @foreach($posts as $post)
                            <div class="flex flex-row even:bg-gray-50 border border-x-0 -mx-6 px-6 py-2 content-center">
                                    <p class="grow content-center">{{ $post->title }}</p>
                                    <p class="w-1/4 text-sm content-center">{{ $post->slug }}</p>
                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                              class="flex flex-row gap-1 w-1/4 justify-end content-center"                                        >
                                            <x-primary-link-button
                                                href="{{ route('posts.show', $post->id) }}">
                                                Show
                                            </x-primary-link-button>

                                            <x-primary-link-button
                                                href="{{ route('posts.edit', $post->id) }}">
                                                Edit
                                            </x-primary-link-button>

                                            @csrf
                                            @method('DELETE')

                                            <x-secondary-button>
                                                Delete
                                            </x-secondary-button>
                                        </form>
                            </div>
                        @endforeach
                        <footer class="w-full">
                                {{ $posts->links() }}
                        </footer>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
