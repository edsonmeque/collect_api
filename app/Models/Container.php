<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\TypeContainer;
use App\Models\Localization;
use App\Models\Status;
use App\Models\Capacity;
class Container extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial','number','image',
        'tags','capacity_id', 'status_id',
        'user_id','district_id','type_container_id','color_id','localization_id'];
    /**
     * Get the user that owns the Container
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

  

    /**
     * Get the status that owns the Container
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statuss()
    {
        return $this->belongsTo(Status::class);
    }
    /**
     * Get the user that owns the Container
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the typeconainer that owns the Container
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(TypeContainer::class);
    }

    /**
     * Get all of the collects for the Container
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collects()
    {
        return $this->hasMany(Collect::class);
    }

    public function collect_count_collected($status = 6)
    {
        return $this->collects->where('status_id', $status)->count();
    }
/**
 * Get the localization that owns the Container
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function localization()
{
    return $this->belongsTo(Localization::class);
    
}

/**
 * Get the capacity that owns the Container
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function capacity()
{
    return $this->belongsTo(Capacity::class);
}

/**
 * Get the color that owns the Container
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function color()
{
    return $this->belongsTo(Color::class);
}
}
