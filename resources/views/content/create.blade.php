<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </div>

    <form method="post" action="{{ route('content.store') }}">
        @csrf
        @method('post')
    
        <input type="text" name="title" placeholder="title">
        <input type="text" name="url" placeholder="url">
        <input type="text" name="author" placeholder="author">
    
        @if(isset($playlists) && count($playlists) > 0)
            <select name="playlist_id">
                @foreach ($playlists as $playlist)
                    <option value="{{ $playlist->id }}">{{ $playlist->title }}</option>
                @endforeach
            </select>
        @else
            <p>Nenhuma playlist disponível.</p>
        @endif
    

        <button type="submit">create</button>
    </form>
</body>
</html>