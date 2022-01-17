<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- font-style --}}
    <link href='https://fonts.googleapis.com/css?family=Dancing Script|Cardo' rel='stylesheet'>


</head>
<body>
    <div class="header flex items-top justify-center min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                <h1 class="title text-center my-52">
                    <span data-aos="zoom-in" data-aos-duration="2000">
                        MEMORY <br> PHOTOS
                    </span>
                </h1>
            </div>
        </div>
    </div>

    @php
        $categories = App\Models\Category::get();
    @endphp

    <div class="my-5 mx-5 px-5">
        <a href="{{ route('category.index') }}" class="bg-green-500 px-2 py-2 text-white">See All Categories</a>
    </div>

    <div class="my-5">
        <div class="grid grid-cols-3 mx-5 justify-center">
            {{-- list of objects --}}
            @foreach ($categories as $category)
            <a href="{{ route('category.show', $category) }}">
                <img src="{{ asset($category->categoryThumbnail) }}" alt="{{ $category->categoryThumbnail }}" class="rounded-full ml-5">
            </a>
            @endforeach
        </div>
    </div>

    <div class="banner px-20 my-20">
        <div class="grid grid-cols-2 py-20">
            <div data-aos="fade-up-right">
                <img src="{{ asset('images/image 1.png') }}" alt="">
            </div>
            <div data-aos="fade-up-left">
                <h3 class="description">
                    Post Your Beautiful Memories
                </h3>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium tincidunt ligula at lobortis. In cursus, enim ut commodo pretium, purus odio mollis sem, a consectetur urna tellus sit amet ligula. Nam purus mi, lobortis id dignissim sed, dignissim sed sem. Donec finibus vulputate ligula ac pretium. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                </p>
            </div>
            <div></div>
        </div>
    </div>

    <footer class="banner">
        <div class="grid grid-cols-3 px-20">
            <div class="px-5">
                <h4 class="foot">Learn More</h4>
                <p class="foot">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam nesciunt atque velit tempore officiis nostrum necessitatibus dolorem perferendis commodi iusto, nobis eum! Quos sit veniam repellat inventore officia, delectus modi.</p>
            </div>
            <div class="px-5">
                <h4 class="foot">Make your memory</h4>
                <p class="foot">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam nesciunt atque velit tempore officiis nostrum necessitatibus dolorem perferendis commodi iusto, nobis eum! Quos sit veniam repellat inventore officia, delectus modi.</p>
            </div>
            <div class="px-5">
                <h4 class="foot">Write your stories</h4>
                <p class="foot">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam nesciunt atque velit tempore officiis nostrum necessitatibus dolorem perferendis commodi iusto, nobis eum! Quos sit veniam repellat inventore officia, delectus modi.</p>
            </div>
        </div>

        <hr class="mx-20">

        <div class="px-20">
            <div class="grid grid-cols-2">
                <div>
                    <h2 class="foot">
                        Memory Photos
                    </h2>
                </div>

                <div>
                    <div class="grid grid-cols-3 float-right">
                        <div class="mx-3">
                            <h6 class="foot">About</h6>
                        </div>
                        <div class="mx-3">
                            <h6 class="foot">Write</h6>
                        </div>
                        <div class="mx-3">
                            <h6 class="foot">Help</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
