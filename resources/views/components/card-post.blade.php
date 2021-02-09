@props(['post']) <!-- pasarle el parámetro q se va a usar y q se mandará desde la otra vista -->
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
        <img class="w-full h-72 object-cover object-center"
            src="{{ Storage::url($post->image->url) }}" alt="">
    @else <!-- que muestre una img por defecto -->
        <img class="w-full h-72 object-cover object-center"
        src="https://cdn.pixabay.com/photo/2020/03/23/19/17/jack-russel-4961793_960_720.jpg" alt="">
    @endif

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post)}}"> {{ $post->name }}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {!! $post->extract !!}
        </div>
    </div>

    <!-- listar los tags de ese post -->
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="display:inline-block bg-gray-200 rounded-full px-3 py-1 mr-2 text-sm text-gray-800"> {{ $tag->name }} </a>
        @endforeach

    </div>
</article>
