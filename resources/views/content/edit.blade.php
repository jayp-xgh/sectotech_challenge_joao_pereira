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

    <form method="post" action="{{ route('content.update', ['playlistId' => $content->id]) }}">
        @csrf
        @method('put')

        <input type="hidden" name="id" value="{{ $content->id }}">
        <input type="text" name="title" placeholder="title" value="{{ $content->title }}">
        <input type="text" name="url" placeholder="url" value="{{ $content->url }}">
        <input type="text" name="author" placeholder="author" value="{{ $content->author }}">
        
        @if(isset($playlists) && count($playlists) > 0)
            <select name="playlist_id">
                <option value="">Selecione uma playlist</option>
                @foreach ($playlists as $playlist)
                    <option value="{{ $playlist->id }}" {{ $playlist->id == $content->playlist_id ? 'selected' : '' }}>
                        {{ $playlist->title }}
                    </option>
                @endforeach
            </select>
        @else
            <p>Nenhuma playlist disponível.</p>
        @endif

        <button type="submit">save</button>
    </form>

  
</body>
</html>