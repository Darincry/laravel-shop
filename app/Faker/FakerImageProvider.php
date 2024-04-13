<?php

namespace App\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FakerImageProvider extends Base
{
    public function loremPicture(string $dir, int $width = 500, int $height = 500): string
    {
        $name = $dir . '/' . Str::random(7) . '.jpg';

        Storage::put(
            'public/' . $name,
            file_get_contents("https://loremflickr.com/$width/$height")
        );

        return "/storage/$name";
    }
}
