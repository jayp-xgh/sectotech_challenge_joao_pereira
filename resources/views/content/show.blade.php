<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
    <a href="{{ route('playlist.index')  }}">Voltar</a>
    <table>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Playlist Title</th>
                <th>Title</th>
                <th>Url</th>
                <th>Created At</th>
            </tr>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td>{{ $content->playlist->title }}</td>
                    <td>{{ $content->title }}</td>
                    <td>{{ $content->url }}</td>
                    <td>{{ $content->creation_date }}</td>
                    <td>
                        <a href="{{ route('content.edit', ['content' => $content->id]) }}"><button>Edit</button></a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('content.destroy', ['content' => $content]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </table>
</body>
</html>