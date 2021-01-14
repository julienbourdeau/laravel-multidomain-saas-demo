<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 pt-8 pb-16">
                <h1 class="text-bold text-3xl mb-8">{{ $post->title }}</h1>

                <ul class="mb-8">
                    <li><strong>id:</strong> {{ $post->id }}</li>
                    <li><strong>team_id:</strong> {{ $post->team_id }}</li>
                </ul>

                <div>{!! nl2br($post->content) !!}</div>
            </div>
        </div>
    </div>
</x-app-layout>
