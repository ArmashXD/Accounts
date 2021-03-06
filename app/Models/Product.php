<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $tax_id
 * @property integer $category_id
 * @property integer $supplier_id
 * @property string $name
 * @property string $guid
 * @property string $model
 * @property float $sale_price
 * @property string $serial_number
 * @property float $supplier_price
 * @property string $details
 * @property string $created_at
 * @property string $updated_at
 * @property MainCategory $mainCategory
 * @property Supplier $supplier
 * @property Tax $tax
 * @property Medium[] $media
 */
class Product extends Model
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
    protected $fillable = ['tax_id', 'category_id', 'supplier_id', 'name', 'guid', 'model', 'sale_price', 'serial_number', 'supplier_price', 'details', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
