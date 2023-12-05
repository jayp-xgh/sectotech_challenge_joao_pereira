<?php

namespace App\DTO\Content;


class Update
{
    public function __construct(
        public int $id,
        public int $playlist_id,
        public string $title,
        public string $url,
        public ?string $author,
    ){}
}