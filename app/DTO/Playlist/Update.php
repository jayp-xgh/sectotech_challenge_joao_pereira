<?php

namespace App\DTO\Playlist;


class Update
{
    public function __construct(
        public int $id,
        public string $title,
        public string $author,
        public ?string $description,
    ){}
}