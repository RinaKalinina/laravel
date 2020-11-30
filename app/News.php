<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function getAllNewsWithPadinate(int $countItems)
    {
        return self::where('is_visible', true)->paginate($countItems);
    }
}
