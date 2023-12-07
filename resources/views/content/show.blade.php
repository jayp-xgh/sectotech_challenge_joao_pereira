<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Playlist</title>
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
    <a href="{{ route('playlist.index') }}" class="absolute top-10 left-20 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
        Voltar
    </a>
    <div class="w-3/5 flex items-start justify-items-start flex-col justify-start gap-10 mt-3 h-[100%] container">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Content List</h1>

        <table border="1"class="w-[100%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-2">Id</th>
                <th scope="col" class="px-6 py-2">Playlist Title</th>
                <th scope="col" class="px-6 py-2">Title</th>
                <th scope="col" class="px-6 py-2">Url</th>
                <th scope="col" class="px-6 py-2">Created At</th>
            </tr>
            @foreach ($contents as $content)
            <tr class="odd:bg-[#1a1e27] odd:dark:bg-[#1a1e27] even:bg-[#20242d] even:dark:bg-[#20242d] border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $content->id }}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $content->playlist->title }}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $content->title }}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $content->url }}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $content->creation_date }}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{ route('content.edit', ['content' => $content->id]) }}">
                            <button class="text-sky-600">Edit</button>
                        </a>
                    </th>
                    <th>
                        <form method="post" action="{{ route('content.destroy', ['content' => $content]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>