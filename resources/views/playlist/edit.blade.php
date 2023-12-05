<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h1>Edit</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </div>
    <form method="post" action="{{ route('playlist.update', ['playlist' => $playlist]) }}">
        @csrf
        @method('put')

        <input type="hidden" name="id" value="{{ $playlist->id }}">
        <input type="text" name="title" placeholder="title" value="{{ $playlist->title }}">
        <input type="text" name="description" placeholder="description" value="{{ $playlist->description }}">
        <input type="text" name="author" placeholder="author" value="{{ $playlist->author }}">
        <button type="submit">save</button>
    </form>

  
</body>
</html>