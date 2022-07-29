<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Container;
class TypeContainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    /**
     * Get all of the commentcontainers for the TypeContainer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containers()
    {
        return $this->hasMany(Container::class);
    }
}
