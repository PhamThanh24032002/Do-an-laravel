<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'sale_price', 'image', 'desscription', 'status', 'category_id'];
    use HasFactory;

    public function add($request, $image)
    {
        $product = products::create([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'image' => $image,
            'desscription' => $request->desscription,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);
        return $product;
    }

    public function UpdatePro($request, $file_name, $id)
    {
        // dd($file_name);
        $product = products::find($id);
        $product->Update([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'image' => $file_name,
            'desscription' => $request->desscription,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);
        return $product;
    }

    public function DeleteId($id)
    {
        return products::find($id)->delete();
    }
}
