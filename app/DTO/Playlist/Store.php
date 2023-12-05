<?php

namespace App\DTO\Playlist;


class Store
{
    public function __construct(
        public string $title,
        public string $author,
        public ?string $description,
    ){}
}