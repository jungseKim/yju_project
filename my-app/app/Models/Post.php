<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function imagePath()
    {
        // $path='/storage/image/';
        $path = env('IMAGE_PATH', '/storage/image/');
        $imageFile = $this->img ?? 'noimge.jpg';
        return $path . $imageFile;
    }
}
