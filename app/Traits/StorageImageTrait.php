<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $path = $request->file($fieldName)->store($folderName);

            $dataUploadTrait = [
                'name' => $request->file($fieldName)->getClientOriginalName(),
                'path' => Storage::url($path),
            ];

            return $dataUploadTrait;
        }
        return null;
    }

    public function storageTraitUploadMultiple($request, $fieldName, $folderName)
    {
        $dataUploadTrait = [];

        if ($request->hasFile($fieldName)) {
            foreach ($request->file($fieldName) as $file) {
                $path = $file->store($folderName);

                $dataUploadTrait[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => Storage::url($path),
                ];
            }
        }

        return !empty($dataUploadTrait) ? $dataUploadTrait : null;
    }
}
