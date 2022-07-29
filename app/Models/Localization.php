<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Container;
class Localization extends Model
{
    use HasFactory;

    /**
     * Get the container associated with the Localization
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function container()
    {
        return $this->hasOne(Container::class);
        
    }

}
