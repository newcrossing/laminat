<?php

namespace App\Services;

use App\Models\File;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class FileUploadService
{
    public function uploadFile(Model $model, Request $request)
    {
        $files = $request->file('files');

        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $f = new File([
                    'filename' => Str::uuid(),
                    'extension' => $file->extension(),
                    'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                ]);

                $model->files()->save($f);
                if (!$file->storeAs('/', $f->full_name_file, 'files')) {
                    Log::info("Ошибка загрузки файла", [$file]);
                }
            }
        }

        return true;
    }
}