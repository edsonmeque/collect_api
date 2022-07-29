<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capital',
    ];


    /**
     * Get all of the provinces for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
