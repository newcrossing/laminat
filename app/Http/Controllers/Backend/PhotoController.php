<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {

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
            if ($image->width() > $image->height()) {
                $image->scale(height: 500)
                    ->crop(400, 500, 0, 0, position: 'center-center')
                    ->save(Storage::disk('product')->path('/cr_400/') . $foto->full_name_file);
                $image = ImageManager::imagick()->read($file);
                $image->scale(height: 125)
                    ->crop(100, 125, 0, 0, position: 'center-center')
                    ->save(Storage::disk('product')->path('/cr_100/') . $foto->full_name_file);
            } else {
                $image->scale(width: 400)
                    ->crop(400, 500, 0, 0, position: 'center-center')
                    ->save(Storage::disk('product')->path('/cr_400/') . $foto->full_name_file);
                $image = ImageManager::imagick()->read($file);
                $image->scale(width: 100)
                    ->crop(100, 125, 0, 0, position: 'center-center')
                    ->save(Storage::disk('product')->path('/cr_100/') . $foto->full_name_file);
            }


            $image = ImageManager::imagick()->read($file);
            $image->scale(width: 100)->save(Storage::disk('product')->path('/100/') . $foto->full_name_file);
            $image = ImageManager::imagick()->read($file);
            $image->scale(width: 300)->save(Storage::disk('product')->path('/300/') . $foto->full_name_file);
            $image = ImageManager::imagick()->read($file);
            $image->scale(width: 800)->save(Storage::disk('product')->path('/800/') . $foto->full_name_file);
            $image = ImageManager::imagick()->read($file);
            $image->scale(width: 1500)->save(Storage::disk('product')->path('/1500/') . $foto->full_name_file);

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
        //unlink('public/' . $img->filename . '.' . $img->extension);
        $img->delete();
        Log::info("Удалил " . $imgId);

        return true;
    }

    public function sorting(Request $request)
    {
        foreach ($request->params as $k => $v) {
            $foto = Foto::find($v['key']);
            if ($foto->order != $k) {
                $foto->order = $k;
                $foto->save();
            }
        }
        return true;
    }
}
