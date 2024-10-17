<x-guest-layout>
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

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                            class="flex flex-row gap-4"
                                        >
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3">
                                {{ $posts->links() }}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
