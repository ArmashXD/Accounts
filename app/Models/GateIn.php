<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $purchase_id
 * @property string $name
 * @property string $details
 * @property string $date
 * @property float $invoice_number
 * @property float $supplier_id
 * @property float $quantity
 * @property float $rate
 * @property float $total
 * @property string $item_information
 * @property string $created_at
 * @property string $updated_at
 * @property Purchase $purchase
 */
class GateIn extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gatein';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['purchase_id', 'name', 'details', 'date', 'invoice_number', 'supplier_id', 'quantity', 'rate', 'total', 'item_information', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }
}
