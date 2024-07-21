<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Foto;
use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;

use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Response;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        // create new manager instance with desired driver
//        $image = ImageManager::imagick()->read($request['file']);
//        $image->toJpeg()->save('public/test.jpg');
//        $image->toJpeg()->save('public/test.jpg');
        $foto = new Foto([
            'filename' => Str::uuid(),
            'extension' => $request['file']->extension(),
        ]);

//        $image = ImageManager::imagick()->read($request['file']);
//        $name = Str::uuid();
//// resize to 300 x 200 pixel
//        $image->scale(width: 100)->save("public/" . $name . ".jpg");;
        $product =  Product::find($request->id);
        $product->fotos()->save($foto);

        Log::info("sdf", $request->all());
//        return response()->json('ok');
        return response()->json('success', 200);
        // return Response::json('error', 400);

    }
}
