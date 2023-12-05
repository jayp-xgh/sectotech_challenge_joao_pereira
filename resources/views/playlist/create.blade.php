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
    <form method="post" action="{{ route('playlist.store') }}" id="form">
        @csrf
        @method('post')

        <input type="text" name="title" placeholder="title" >
        <input type="text" name="description" placeholder="description">
        <input type="text" name="author" placeholder="author">
        <button type="submit" id="btnSubmit">create</button>
    </form>
</body>
</html>