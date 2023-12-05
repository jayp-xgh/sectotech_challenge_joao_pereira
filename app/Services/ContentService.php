<?php

namespace App\Services;

use App\DTO\Content\Store;
use App\DTO\Content\Update;
use App\Models\Content;

class ContentService
{
    public function store(Store $store): bool
    {
        return (bool) Content::create(get_object_vars($store));
    }
    public function update(Update $update): bool
    {
        
        $playList = Content::findOrfail($update->id);
        return $playList->update(get_object_vars($update));
    }
}
