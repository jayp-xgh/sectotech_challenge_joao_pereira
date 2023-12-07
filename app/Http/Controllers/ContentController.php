<?php

namespace App\Http\Controllers;

use App\DTO\Content\Store;
use App\DTO\Content\Update;
use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Models\Playlist;
use App\Services\ContentService;

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
        $DTO = new Update(
            $request->input('id'),
            $request->input('playlist_id'),
            $request->input('title'),
            $request->input('url'),
            $request->input('author'),
        );

        $ContentService = new ContentService();
        $ContentService->update($DTO);

        return redirect(route('content.show', ['playlist' => $request->input('playlist_id')]))->with('success', "Content {$request->input('title')}  updated successfully!");
    }

    public function show($playlistId)
    {
        $contents = Content::where('playlist_id', $playlistId)->get();
        return view('content.show', compact('contents', 'playlistId'));
    }

    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('content.show', ['playlist' => $content->playlist_id])->with('success', "Content {$content->title} deleted successfully!");
    }
}
