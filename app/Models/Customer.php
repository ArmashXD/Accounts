<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $guid
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $previous_credit_balance
 * @property string $created_at
 * @property string $updated_at
 */
class Customer extends Model
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
    protected $fillable = ['name', 'email', 'phone', 'address', 'previous_credit_balance', 'created_at', 'updated_at'];

}
