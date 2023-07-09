<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count() > 0)
            <x-post-featured-card :post="$posts[0]"/>

            @if($posts->count() > 1)
                <x-posts-grid :posts="$posts"/>

            @endif
        @else
            <p class="text-center"> No post yet. Please check back later</p>
        @endif
    </main>
</x-layout>
