<x-app-layout>
    <x-slot name="title">
        {{ $album->albumName }}
    </x-slot>

    <x-slot name="slot">
        <img src="{{ asset('storage/'.$album->albumThumbnail) }}" alt="{{ $album->albumThumbnail }}">
        <p>{{ $album->albumDescription }}</p>

        <div class="grid grid-cols-2">
            <div>
                <a href="{{ route('album.edit', $album) }}" class="bg-green-500 hover:bg-green-400 text-white px-2 py-1">Edit</a>
            </div>
            <div>
                <form action="{{ route('album.destroy', $album) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-400 text-white px-2 py-1">Delete</a>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
