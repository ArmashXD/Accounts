<?php

namespace App\Models;

use App\Observers\SaleObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property integer $product_id
 * @property integer $tax_id
 * @property integer $unit_id
 * @property float $total
 * @property float $rate
 * @property float $discount
 * @property string $date
 * @property string $code
 * @property string $details
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property Product $product
 * @property Tax $tax
 * @property Unit $unit
 * @property string $type
 */
class Sale extends Model
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
        Sale::observe(SaleObserver::class);
    }

    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'type' , 'product_id', 'tax_id','quantity', 'unit_id', 'total', 'rate', 'discount', 'date', 'code', 'details', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax()
    {
        return $this->belongsTo('App\Models\Tax');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }
}
