<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class FileController extends Controller
{
    public $urlh = 'uploads';

    public function store($id, $model, $type)
    {
        $this->validate(request(), ['file' => 'required|mimes:png|max:8192']);

        if (request()->hasFile('file')) {

            $filenamewithextension = request()->file('file')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = request()->file('file')->getClientOriginalExtension();

            $filenametostore = 'file_' . $id . '_' . md5($filename) . '.' . $extension;
            $thumbnail = 'file_' . $id . '_' . md5($filename) . '.' . $extension;

            if ($model == 'user') {
                request()->file('file')->storeAs('public/' . $this->urlh . '/', $thumbnail);

                $thumbnailpath = public_path('storage/' . $this->urlh . '/' . $thumbnail);
                $this->createThumbnail($thumbnailpath, 180, null, null, null);
            } else {
                request()->file('file')->storeAs('public/' . $this->urlh . '/', $filenametostore);
                request()->file('file')->storeAs('public/' . $this->urlh . '/thumbs/', $thumbnail);

                $thumbnailpath = public_path('storage/' . $this->urlh . '/thumbs/' . $thumbnail);
                $this->createThumbnail($thumbnailpath, 400, null, null, null);
            }

            File::create([
                $model . '_id' => $id,
                'type' => $type,
                'url' => 'file_' . $id . '_' . md5($filename) . '.' . $extension,
            ]);
        }

    }

    public function createThumbnail($path, $width, $height, $text = '', $watermark = '')
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->text($text, 450, 100);
        if ($watermark != '') {
            $img->insert($watermark);
        }
        $img->save($path);
    }

    public function destroy(File $file)
    {
        if ($file->post_id != null) {
            if (!$post = Post::find($file->post_id)) {
                return redirect()->back();
            }
            $post->status = 'D';
            $post->save();

            $file->delete();
            if (Storage::exists('public/' . $this->urlh . '/thumbs/' . $file->url)) {
                Storage::delete('public/' . $this->urlh . '/thumbs/' . $file->url);
            }
            if (Storage::exists('public/' . $this->urlh . '/' . $file->url)) {
                Storage::delete('public/' . $this->urlh . '/' . $file->url);
            }
            return back()->withSuccess(__('File deleted successfully'));
        }

        if ($file->user_id != null) {
            if (!$user = User::find($file->user_id)) {
                return redirect()->back();
            }
            $file->delete();
            if (Storage::exists('public/' . $this->urlh . '/' . $file->url)) {
                Storage::delete('public/' . $this->urlh . '/' . $file->url);
            }
            return back()->withSuccess(__('File deleted successfully'));
        }
    }

}
