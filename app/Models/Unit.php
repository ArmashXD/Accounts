<?php

namespace App\Models;

use App\Observers\UnitObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Type $type
 */
class Unit extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        Unit::observe(UnitObserver::class);

    }

    /**
     * @var array
     */
    protected $fillable = ['type_id', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Unit::class);
    }
}
