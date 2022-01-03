<x-app-layout>

    <x-slot name="style">
        {{-- internal css --}}
        <style>
            body{
                color: #A0D65D
            }
        </style>
    </x-slot>

    <x-slot name="title">
        Edit Album
    </x-slot>

    <x-slot name="slot">
        <div class="mx-28">
            <h2 class="text-4xl text-center">Edit Album</h2>
            <form action="{{ route('album.update', $album) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="w-full" for="albumName">Album Name</label>
                    <input class="w-full" type="text" name="albumName" id="albumName" value="{{ $album->albumName }}">
                </div>

                <div class="form-group">
                    <label class="w-full" for="albumThumbnail">Album Thumbnail</label>
                    <img src="{{ asset('storage/'.$album->albumThumbnail) }}" alt="">
                    <input class="w-full" type="file" name="albumThumbnail" id="albumThumbnail">
                </div>

                <div class="form-group">
                    <label class="w-full" for="category_id">Category</label>
                    <select class="w-full" name="category_id" id="category_id">
                        <option selected disabled>Pilih Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $album->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->categoryName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="w-full" for="albumDescription">Album Description</label>
                    <textarea name="albumDescription" id="albumDescription" class="w-full" rows="10">
                        {{ $album->albumDescription }}
                    </textarea>
                </div>

                <button type="submit" class="bg-green-500 py-3 hover:bg-green-600 rounded-sm text-white w-full">Edit Album</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
