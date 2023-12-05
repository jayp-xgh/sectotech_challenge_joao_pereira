<?php

namespace App\Services;

use App\DTO\Playlist\Update;
use App\DTO\Playlist\Store;
use App\Models\Playlist;

class PlaylistService
{
    public function store(Store $store): bool
    {
        return (bool) Playlist::create(get_object_vars($store));
    }
    public function update(Update $update): bool
    {
        
        $playList = Playlist::findOrfail($update->id);
        return $playList->update(get_object_vars($update));
    }
}
