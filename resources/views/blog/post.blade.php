<x-guest-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg px-8 pt-8 pb-16">
                <h1 class="text-bold text-3xl mb-8">{{ $post->title }}</h1>

                <ul class="mb-8">
                    <li><strong>id:</strong> {{ $post->id }}</li>
                    <li><strong>team_id:</strong> {{ $post->team_id }}</li>
                </ul>

                <div>{!! nl2br($post->content) !!}</div>
            </div>
        </div>
    </div>
</x-guest-layout>
