<x-app-layout>
    <x-slot name="title">
        {{ $album->albumName }}
    </x-slot>

    <x-slot name="slot">
        <img src="{{ asset('storage/'.$album->albumThumbnail) }}" alt="{{ $album->albumThumbnail }}">
        <p>{{ $album->user->name }}</p>
        <p>{{ $album->albumDescription }}</p>

        {{-- user acces --}}
        {{-- @isset(Auth::user()->id) --}}
        {{-- @auth --}}
        @guest
            <div class="bg-green-500 text-green-900 w-full text-center">
                Harus <a href="{{ route('login') }}">login</a> sebagai user dulu
            </div>
        @else
        @if (Auth::user()->id == $album->user_id)
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

        <div class="container">
            <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data" id="createForm">
                @csrf
                <div class="form-group">
                    <label for="photoTitle">Photo Title</label>
                    <input type="text" name="photoTitle" id="photoTitle" class="w-full">
                </div>
                <div class="form-group">
                    <label for="photoPhoto">Photo</label>
                    <input type="file" name="photoPhoto" id="photoPhoto" class="w-full">
                </div>
                <div class="form-group">
                    <label for="photoDescription">Photo Description</label>
                    <textarea name="photoDescription" id="photoDescription" class="w-full" rows="10"></textarea>
                </div>
                <input type="hidden" name="album_id" value="{{ $album->id }}">
                <input type="hidden" name="user_id" value="{{ $album->user_id }}">

                <button type="submit" class="w-full bg-green-500 text-white py-5 text-center">Create Photo</button>
            </form>
        </div>

        <div class="grid grid-cols-3">
            @forelse ($photos as $photo)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('storage/'.$photo->photoPhoto) }}" alt="Mountain">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $photo->photoTitle }}</div>
                    <p class="text-gray-700 text-base">
                        {{ Str::limit($photo->photoDesc, 50, '...') }}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <img src="#" class="rounded w-20 h-20" alt="">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                </div>
            </div>
            @empty
                <a href="#createForm">Create Photo</a>
            @endforelse
        </div>
        @endif
        @endguest
        {{-- @endauth --}}
        {{-- @endisset --}}
        {{-- user acces --}}

    </x-slot>
</x-app-layout>
