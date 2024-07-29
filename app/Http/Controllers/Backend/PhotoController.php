<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Foto;
use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;

use CKSource\CKFinder\Filesystem\File\File;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Storage;
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
        $files = $request->images;
//dd($request->toArray());
        $class = Relation::getMorphedModel($request['model']);
        //Log::info(" " . $class);
        $model = new $class;

        foreach ($files as $file) {
            $foto = new Foto([
                'filename' => Str::uuid(),
                'extension' => $file->extension(),
            ]);



            $image = ImageManager::imagick()->read($file);
            $image->scale(width: 100)->save(Storage::disk('product')->path('/100/') . $foto->full_name_file);
            $image = ImageManager::imagick()->read($file);
            $image->scale(width: 300)->save(Storage::disk('product')->path('/300/') . $foto->full_name_file);
            $image = ImageManager::imagick()->read($file);
            $image->scale(width: 800)->save(Storage::disk('product')->path('/800/') . $foto->full_name_file);

            Log::info("Сохранено изображение " . $foto->full_name_file);


            $product = $model->find($request->id);
            $product->fotos()->save($foto);


        }

        return response()->json('success', 200);


    }

    public function delete($imgId)
    {
        $img = Foto::find($imgId);


        // check image in database
        if (!$img) {
            return response()->json(['error' => 'Нет в базе']);
        }
        // check image in files
//        if (!File::exists('public/' . $img->filename.'.'.$img->extension)) {
//            return response()->json(['error' => 'Sorry, the image is not in the file folder']);
//        }
        unlink('public/' . $img->filename . '.' . $img->extension);
        $img->delete();
        Log::info("Удалил " . $imgId);

        return true;


    }
}
