<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $ac_name
 * @property float $ac_number
 * @property string $branch
 * @property string $image_url
 * @property string $created_at
 * @property string $updated_at
 */
class Bank extends Model
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
    protected $fillable = ['name', 'ac_name', 'ac_number', 'branch', 'image_url', 'created_at', 'updated_at'];

}
