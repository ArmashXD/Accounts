<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $guid
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $details
 * @property string $previous_credit_balance
 * @property string $created_at
 * @property string $updated_at
 */
class Supplier extends Model
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
    protected $fillable = ['guid', 'name', 'phone', 'address', 'details', 'previous_credit_balance', 'created_at', 'updated_at'];

}
