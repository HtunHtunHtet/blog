@auth
    <x-panel>
        <form action="/posts/{{$post->slug}}/comments" method="post">
            @csrf
            <header class="flex item-center">
                <img class="rounded-full" src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     alt="user-avatar" width="60" height="60"/>
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body"
                          class="w-full text-sm focus:outline-none focus:ring"
                          rows="5"
                          placeholder="Something to say"
                          required
                ></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-grey-200 pt-6 border-t">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-bold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">Login
            to leave
            a comment</a>
    </p>
@endauth
