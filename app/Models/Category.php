<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Type $type
 * @property Asset[] $assets
 * @property Equity[] $equities
 * @property Expense[] $expenses
 * @property Income[] $incomes
 * @property Liability[] $liabilities
 */
class Category extends Model
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
    protected $fillable = ['type_id', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assets()
    {
        return $this->hasMany('App\Models\Asset');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equities()
    {
        return $this->hasMany('App\Models\Equity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses()
    {
        return $this->hasMany('App\Models\Expense');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomes()
    {
        return $this->hasMany('App\Models\Income');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function liabilities()
    {
        return $this->hasMany('App\Models\Liability');
    }
}
