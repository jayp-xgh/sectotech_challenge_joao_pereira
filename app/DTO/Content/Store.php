<?php

namespace App\DTO\Content;


class Store
{
    public function __construct(
        public string $playlist_id,
        public string $title,
        public string $url,
        public string $author,        
    ){}
}