<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $image_url
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 */
class Media extends Model
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
    protected $fillable = ['product_id', 'image_url', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function imageUpload(Request $request, Product $product){
        foreach ($request->file('images') as $image) {
            $name = $image->getClientOriginalName();
            $image->move(public_path() . '/images/', $name);
            $data[] = $name;
        }
        $media = new Media();
        $media->product()->associate($product);
        $media->image_url = json_encode($data);
        $media->save();
    }
}
