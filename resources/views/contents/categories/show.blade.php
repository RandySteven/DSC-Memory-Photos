<x-app-layout>
    <x-slot name="title">
        {{ $category->categoryName }}
    </x-slot>

    <x-slot name="slot">
        <div>
            <img src="{{ asset($category->categoryThumbnail) }}" alt="">
        </div>

        @forelse ($albums as $album)
        <div>
            <a href="{{ route('album.show', $album) }}">
                <img width="200" src="{{ asset('storage/'.$album->albumThumbnail) }}" alt="">
                <h1>{{ $album->albumName }}</h1>
            </a>
        </div>
        @empty
            <h3>
                Album masih kosong silahkan bikin <a href="{{ route('album.create') }}">Bikin album</a>
            </h3>
        @endforelse
    </x-slot>
</x-app-layout>
