<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $sale_id
 * @property float $total
 * @property float $rate
 * @property float $discount
 * @property float $quantity
 * @property string $date
 * @property string $code
 * @property string $details
 * @property float $customer_id
 * @property float $product_id
 * @property float $tax_id
 * @property float $unit_id
 * @property string $created_at
 * @property string $updated_at
 * @property Sale $sale
 */
class GateOut extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gateout';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['sale_id', 'total', 'rate', 'discount', 'quantity', 'date', 'code', 'details', 'customer_id', 'product_id', 'tax_id', 'unit_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
