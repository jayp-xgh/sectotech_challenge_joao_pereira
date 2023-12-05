<?php

namespace App\Http\Controllers;

use App\DTO\Playlist\Update;
use App\DTO\Playlist\Store;
use App\Http\Requests\PlaylistRequest;
use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Playlist;
use App\Services\PlaylistService;

class PlaylistController extends Controller
{
    use HasFactory;

    public function index() 
    {
        $playlists = Playlist::orderBy('id', 'asc')->paginate(10);
        return view('playlist.index', ['playlists' => $playlists]);
    }
    
    public function create()
    {
        return view('playlist.create');
    }

    public function store(PlaylistRequest $request)
    {    
        $DTO = new Store(
            $request->input('title'),
            $request->input('author'),
            $request->input('description'),
        );

        $playlistService = new PlaylistService();
        $playlistService->store($DTO);
        return redirect(route('playlist.index'));
    }

    public function edit(Playlist $playlist)
    {
        return view('playlist.edit', ['playlist' => $playlist]);
    }

    public function update(PlaylistRequest $request)
    {
        $DTO = new Update(
            $request->input('id'),
            $request->input('title'),
            $request->input('author'),
            $request->input('description'),
        );

        $playlistService = new PlaylistService();
        $playlistService->update($DTO);
        return redirect(route('playlist.index'))->with('success', "Playlist {$request->input('title')}  updated successfully!");
    }

    public function destroy(Playlist $playlist)
    {
        Content::where('playlist_id', $playlist->id)->delete();
        Playlist::destroy($playlist->id);
    }

}