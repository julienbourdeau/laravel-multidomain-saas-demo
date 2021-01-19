<x-guest-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-3 overflow-hidden">
                @foreach($posts as $post)
                    <div class="flex items-center bg-white overflow-hidden px-4 py-4 sm:px-6 sm:rounded-md">
                        <img src="{{ $post->thumbnail }}" alt="" class="h-32 w-32 mr-6 bg-gray-200 rounded shadow-sm">
                        <div>
                            <h3 class="font-bold text-lg">
                                <a href="{{ route('blogpost', ['post' => $post->id]) }}">{{ $post->title }}</a>
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
</x-guest-layout>
