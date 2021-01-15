<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-3 overflow-hidden">
                @foreach($posts as $post)
                    <div class="flex items-center bg-white shadow overflow-hidden px-4 py-4 sm:px-6 sm:rounded-md">
                        <img src="{{ $post->thumbnail }}" alt="" class="h-32 w-32 mr-6 bg-gray-200 rounded shadow-sm">
                        <div>
                            <h3 class="font-bold text-lg">
                                <a href="{{ "/posts/{$post->id}" }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-800">{{ \Illuminate\Support\Str::limit($post->content, 280) }}</p>
                            <div class="mt-2 space-x-4">
                                <a href="#">Edit</a>
                                <a href="#">Preview</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
