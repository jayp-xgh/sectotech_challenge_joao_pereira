<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Content Edit</title>
    @vite('resources/css/app.css')
    <style>
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body class="bg-[#242933]">
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </div>

    <a href="{{ route('playlist.index') }}" class="absolute top-10 left-20 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
        Voltar
    </a>

    <form method="post" action="{{ route('content.update', ['content' => $content->id]) }}" class="w-3/5 flex items-start justify-items-start flex-col justify-start gap-3 mt-10 h-[80%] container">
        @csrf
        @method('put')

        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Edit Content</h1>

        <input type="hidden" name="id" value="{{ $content->id }}">

        <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" value="{{ $content->title }}" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        
        <label for="url" class="block text-sm font-medium text-gray-900 dark:text-white">Url</label>
        <input type="text" value="{{ $content->url }}" id="url" name="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        
        <label for="author" class="block text-sm font-medium text-gray-900 dark:text-white">Author</label>
        <input type="text" value="{{ $content->author }}" id="author" name="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        
        <label for="playlists" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
        
        @if(isset($playlists) && count($playlists) > 0)
        <select id="playlists" name="playlist_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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

          <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Update Content
        </button>
    </form>
</body>
</html>