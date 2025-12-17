<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Bkwld\Croppa\Facades\Croppa;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {

        $files = $request->images;

        $class = Relation::getMorphedModel($request['model']);

        $model = new $class;

        foreach ($files as $file) {
            $foto = new Foto([
                'filename' => Str::uuid(),
                'extension' => $file->extension(),
            ]);

            DB::beginTransaction();

            try {
                ini_set('memory_limit', '256M');
                $image = ImageManager::imagick()->read($file);
                $image->scale(width: 1500)->save(Storage::disk('product')->path('/1500/') . $foto->full_name_file);

                $product = $model->find($request->id);
                $product->fotos()->save($foto);
                DB::commit();
            } catch (\Throwable $e) {
                DB::rollBack();
                Log::error("PHP перехватил исключение:" . $e->getMessage());
                return response()->json('Error decode file', 501);
            }

        }

        return response()->json('success', 200);
    }

    public function delete($imgId)
    {
        $img = Foto::find($imgId);

        if (!$img) {
            return response()->json(['error' => 'Нет в базе']);
        }

        if (Storage::disk('product_1500')->exists($img->full_name_file)) {
            try {
                Croppa::reset('/storage/thumbnails/' . $img->full_name_file);
                Storage::disk('product_1500')->delete($img->full_name_file);
            } catch (\Throwable $e) {
                Log::error("PHP перехватил исключение при удалении файла картинки:", [$e->getMessage()]);
            }

        }

        Log::info("Удалено фото", [$imgId, $img->full_name_file]);
        $img->delete();

        return response()->json(['success' => true]);
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
