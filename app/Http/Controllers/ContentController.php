<?php

namespace App\Http\Controllers;

use App\DTO\Content\Store;
use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Models\Playlist;
use App\Services\ContentService;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function create()
    {
        $playlists = Playlist::all();
        return view('content.create', compact('playlists'));
    }

    public function store(ContentRequest $request)
    {
        $DTO = new Store(
            $request->input('playlist_id'),
            $request->input('title'),
            $request->input('url'),
            $request->input('author'),
        );

        $ContentService = new ContentService();
        $ContentService->store($DTO);
        return redirect(route('playlist.index'));
    
    }
    public function edit(Content $content)
    {    
        return view('content.edit', ['content' => $content, 'playlists' => Playlist::all()]);
    }

    public function update(ContentRequest $request)
    {
        Content::updated($request->validated());
        return redirect(route('content.edit'))->with('success', "Playlist {$request['title']}  updated successfully!");
    }

    public function show($playlistId)
    {
        $contents = Content::where('playlist_id', $playlistId)->get();
        return view('content.show', compact('contents', 'playlistId'));
    }

    public function destroy(Content $content)
    {
        $playlistId = $content->playlist_id;
        $content->delete();
        return redirect(route("content.show", ['playlistId' => $playlistId]))->with('success', "Content {$content->title} deleted successfully!");
    }
}