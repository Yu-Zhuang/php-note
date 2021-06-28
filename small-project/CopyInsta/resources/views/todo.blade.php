<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            text-align: center;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
        @endif
    <h1>Todo List</h1>
    <form action="/store" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title"><br>
        <textarea name="content" placeholder="content"></textarea><br>
        <input type="submit" value="add">
    </form>

    <div class="list">
        @if (count($collection) < 1)
            <h2>Every thing done</h2>
        @else
            @foreach ($collection as $item)
                <div class="wrap" style="display: block; margin: 10px auto; text-align: center; background-color: #afa;">
                    <a class="title" href="/show/{{ $item->id }}" style="cursor: pointer;">{{ $item->title }}</a>
                    <form action="delete/{{ $item->id ?? " "}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="trash">
                    </form>      
                </div>
            @endforeach            
        @endif
    </div>
       
</body>
</html>