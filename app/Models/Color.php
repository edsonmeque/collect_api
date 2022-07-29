<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Container;
class Color extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the containers for the Color
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containers()
    {
        return $this->hasMany(Container::class);
    }
}
