<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $page->title }}</title>
    <style>
        {!! $page->css !!} 
    </style>
</head>
<body>
    <div class="content">{!! $page->content !!}</div> 
    <a href="{{ route('pages.edit', $page) }}">Edit Page</a>
</body>
</html>
