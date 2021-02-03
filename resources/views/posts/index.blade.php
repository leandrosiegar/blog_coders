<!-- q esta view nos extienda la vista principal -->
<x-app-layout>
    <div class="container ml-auto mr-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-covert bg-center
                    @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url({{ Storage::url($post->image->url) }})">

                    <div class="mt-2">
                        @foreach ($post->tags as $tag)
                            <a class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full"
                                href="{{ route('posts.tag', $tag) }}"> {{ $tag->name }} </a>
                        @endforeach
                    </div>
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('posts.show', $post) }}">{{ $post->name }}</a>
                        </h1>

                    </div>
                </article>


            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>

</x-app-layout>
