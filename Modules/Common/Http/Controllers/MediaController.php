<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Common\Entities\Media;
use App\Http\Helpers\Traits\UploaderHelper;
use Modules\Common\Http\Requests\UploadRequest;
use Modules\Common\Transformers\MediaResource;
use Modules\Common\Http\Requests\UploadOtherRequest;

class MediaController extends Controller
{
    use UploaderHelper;

    public function upload(UploadRequest $request)
    {
        $file = $request->file('selectedFile');
        $base_folder = 'uploads/images';
        $folder_name = ($request->has('folder')) ? $base_folder."/".$request->get('folder') : $base_folder;
        $file_data = $this->handleUploadWithResize($file, $folder_name);
        $media = Media::query()->create([
            'size'      => $file_data['size'],
            'extension' => $file_data['extension'],
            'type'      => $file_data['type'],
            'name'      => $file_data['name'],
            'path'      => $file_data['path'],
        ]);
        if ($media) {
            return jsonResponse(200, 'done', new MediaResource($media));
        }
    }

    public function uploadOtherFiles(UploadOtherRequest $request)
    {
        $file = $request->file('selectedFile');
        $base_folder = 'uploads/other';
        $folder_name = ($request->has('folder')) ? $base_folder."/".$request->get('folder') : $base_folder;
        $file_data = $this->handleUploadWithResize($file, $folder_name);
        $media = Media::query()->create([
            'size'      => $file_data['size'],
            'extension' => $file_data['extension'],
            'type'      => $file_data['type'],
            'name'      => $file_data['name'],
            'path'      => $file_data['path'],
        ]);
        if ($media) {
            return jsonResponse(200, 'done', new MediaResource($media));
        }
    }
}
