<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $page->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>{{ $page->title }}</h1>
    <div class="content">{!! $page->content !!}</div> <!-- Added a class for specific styling -->
    <a href="{{ route('pages.edit', $page) }}">Edit Page</a>
</body>
</html>
