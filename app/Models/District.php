<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Container;
use App\Models\Municipio;
class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'province_id'
    ];

    /**
     * Get the Province that owns the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get all of the containres for the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containres()
    {
        return $this->hasMany(Container::class);
    }


    /**
     * Get the municipio associated with the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne(Municipio::class);
    }
}
