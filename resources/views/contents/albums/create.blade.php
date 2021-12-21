<x-app-layout>

    <x-slot name="title">
        Create Album
    </x-slot>

    <x-slot name="slot">
        <div class="mx-28">
            <h2 class="text-4xl text-center">Create Album</h2>
            <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="w-full" for="albumName">Album Name</label>
                    <input class="w-full" type="text" name="albumName" id="albumName">
                </div>

                <div class="form-group">
                    <label class="w-full" for="albumThumbnail">Album Thumbnail</label>
                    <input class="w-full" type="file" name="albumThumbnail" id="albumThumbnail">
                </div>

                <div class="form-group">
                    <label class="w-full" for="category_id">Category</label>
                    <select class="w-full" name="category_id" id="category_id">
                        <option selected disabled>Pilih Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->categoryName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="w-full" for="albumDescription">Album Description</label>
                    <textarea name="albumDescription" id="albumDescription" class="w-full" rows="10"></textarea>
                </div>

                <button type="submit" class="bg-green-500 py-3 hover:bg-green-600 rounded-sm text-white w-full">Create Album</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
