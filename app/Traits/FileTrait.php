<?php

namespace App\Traits;

use App\Models\File;

trait FileTrait
{
    /**
     * @return mixed
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
