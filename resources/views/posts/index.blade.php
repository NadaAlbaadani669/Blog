{{-- @extends('layout') --}}

{{-- @section('content') --}}

<x-layout>

    <header class="max-w-xl mx-auto mt-20 text-center">
       @include('posts._header')
    </header>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts" />

            {{$posts->links()}}   {{-- to add the pagination--}}
        @else
            <p style="text-align: center">No posts yet. Please check back later.</p>
        @endif


    </main>
</x-layout>
{{-- @endsection --}}



