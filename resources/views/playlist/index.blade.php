<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Playlist</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#242933]">

    <div class="flex justify-center">
        <div class="w-3/5 flex items-start justify-items-start flex-col justify-start gap-3 mt-3 h-[100%] ">
            <div class="flex items-start justify-items-start flex-col gap-[10px]">
                <h1
                    class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    SectoTech</h1>

                <div>
                    <a href="{{ route('playlist.create') }}"
                        class="focus:outline-none text-gray bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-[#6BD49D] dark:hover:bg-[#227F51] dark:focus:ring-green-800">
                        Create Playlist
                    </a>
                    <a href="{{ route('content.create') }}"
                        class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Create contents
                    </a>
                </div>
            </div>

            <div class="relative shadow-md sm:rounded-lg w-[100%]">
                @if ($playlists->count() > 0)
                    <table
                        border="1"class="w-[100%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-2">Id</th>
                            <th scope="col" class="px-6 py-3">Title</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Author</th>
                            <th scope="col" class="px-6 py-3">Edit</th>
                            <th scope="col" class="px-6 py-3">Delete</th>
                            <th scope="col" class="px-6 py-3">Contact</th>
                        </tr>
                        @foreach ($playlists as $playlist)
                            <tr
                                class="odd:bg-[#1a1e27] odd:dark:bg-[#1a1e27] even:bg-[#20242d] even:dark:bg-[#20242d] border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $playlist->id }}
                                </th>
                                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $playlist->title }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $playlist->description }}
                                </th>
                                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $playlist->author }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{ route('playlist.edit', ['playlist' => $playlist]) }}">
                                        <button class="text-[#3A8DFF]">Edit</button>
                                    </a>
                                </th>
                                <th>
                                    <form method="post"
                                        action="{{ route('playlist.destroy', ['playlist' => $playlist]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-[#FF5762] dark:hover:bg-[#A62020] dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </form>
                                </th>
                                <th>
                                    @if ($playlist->content)
                                        <a href="{{ route('content.show', ['playlist' => $playlist->id]) }}">
                                            <button
                                                class="w-auto min-w-[120px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-[#3A8DFF] dark:hover:bg-[#1B4778] focus:outline-none dark:focus:ring-blue-800">
                                                View Contents
                                            </button>
                                        </a>
                                    @else
                                        <button disabled
                                            class="w-auto min-w-[120px] py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            No Content
                                        </button>
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>Nenhuma playlist encontrada.</p>
                @endif
            </div>
            <div class="mb-10">
                {{ $playlists->links() }}
            </div>
        </div>
    </div>
</body>

</html>
