<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bank_id
 * @property string $ac_type
 * @property string $dep_id
 * @property float $amount
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Bank $bank
 */
class Transaction extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['bank_id', 'ac_type', 'dep_id', 'amount', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
