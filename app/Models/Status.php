<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Container;
use App\Models\Collect;
class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function containers()
    {
        return $this->hasMany(Container::class);
    }

    /**
     * Get all of the collects for the Statu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collects()
    {
        return $this->hasMany(Collect::class);
    }
}
