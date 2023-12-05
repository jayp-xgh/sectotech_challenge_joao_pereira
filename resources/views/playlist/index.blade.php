<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Playlist</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-red-600 text-3xl font-bold underline">SectoTech</h1>
    <a href="{{ route('playlist.create') }}">Create playlist</a>
    <a href="{{ route('content.create') }}">Create contents</a>
    <div>
        @if(session()->has('success'))
            <div>
                <h4>{{ session('success') }}</h4>
            </div>
        @endif
    </div>
    <div>
        @if($playlists->count() > 0)
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Contact</th>
                </tr>
                @foreach ($playlists as $playlist)
                    <tr>
                        <td>{{ $playlist->id }}</td>
                        <td>{{ $playlist->title }}</td>
                        <td>{{ $playlist->description }}</td>
                        <td>{{ $playlist->author }}</td>
                        <td>
                            <a href="{{ route('playlist.edit', ['playlist' => $playlist]) }}"><button>Edit</button></a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('playlist.destroy', ['playlist' => $playlist]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('content.show', ['playlistId' => $playlist->id]) }}"><button>Content</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            
            <div style="margin-top: 20px;">
                {{ $playlists->links() }}
            </div>
        @else
            <p>Nenhuma playlist encontrada.</p>
        @endif
    </div>
</body>
</html>
