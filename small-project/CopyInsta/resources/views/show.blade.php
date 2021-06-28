<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1><a href="/todo">Todo</a></h1>
    <h2>{{ $title ?? " " }}</h2>
    <h3>{{ $content ?? " " }}</h3>
    <form action="/update/{{ $id ?? " " }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="new title"><br>
        <textarea name="content" placeholder="new content"></textarea><br>
        <input type="submit" value="update">
    </form>
</body>
</html>