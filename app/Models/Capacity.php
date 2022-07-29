<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Container;
class Capacity extends Model
{
    use HasFactory;

    protected $fillable = [
        'peoples_number',
        'capacity_storege',
        'generated_capitetion',
        'peso',
        'capacity_max',
        'capacityToday',
        'dias',
       
    ];

  
    /**
     * Get all of the containers for the Capacity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containers()
    {
        return $this->hasMany(Container::class);
    }

    /**
     * Get the unit that owns the Capacity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}
