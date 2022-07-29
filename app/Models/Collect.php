<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Traits\HasUuid;
use App\Models\Container;
use App\Models\status;
use App\Models\User;
use Illuminate\Support\Str;
class Collect extends Model
{
    use HasFactory;//,HasUuid;
    protected $fillable = ['user_id','container_id','status_id','created_at', 'updated_at'];
    //protected $primaryKey ='uuid';

    //protected $keyType = 'string';

    //public $incrementing =false;

    public function user()
    {
    
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Container that owns the Collect
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function container()                     
    {
        return $this->belongsTo(Container::class);
    }
    /**
     * Get the status that owns the Collect
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statuss()
    {
        return $this->belongsTo(Status::class);
    }
}
