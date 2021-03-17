<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $sale_id
 * @property integer $product_id
 * @property integer $sale_number
 * @property float $total
 * @property float $quantity
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 * @property Sale $sale
 */
class Returns extends Model
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
    protected $fillable = ['sale_id', 'product_id', 'sale_number', 'total', 'quantity', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
