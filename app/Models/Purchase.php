<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $supplier_id
 * @property string $name
 * @property string $details
 * @property float $purchase_date
 * @property float $invoice_number
 * @property float $quantity
 * @property float $rate
 * @property float $total
 * @property string $item_information
 * @property string $created_at
 * @property string $updated_at
 * @property Supplier $supplier
 */
class Purchase extends Model
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
    protected $fillable = ['supplier_id', 'name', 'details', 'purchase_date', 'invoice_number', 'quantity', 'rate', 'total', 'item_information', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
