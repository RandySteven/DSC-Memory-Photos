<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
    @foreach ($categories as $category)
        <img src="{{ asset($category->categoryThumbnail) }}" alt="">
    @endforeach
</body>
</html>
