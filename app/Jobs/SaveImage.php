<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Intervention\Image\ImageManagerStatic as Image;

class SaveImage
{
    use Dispatchable, Queueable;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($image, $file_name, $mime)
    {
        $this->image        = $image;
        $this->file_name    = $file_name;
        $this->mime         = $mime;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $folder_path_130 = public_path('uploads/130x130');
        $folder_path_original = public_path('uploads/original');
        if (!file_exists($folder_path_130)) {
            mkdir($folder_path_130, 0777, true);
        }

        if (!file_exists($folder_path_original)) {
            mkdir($folder_path_original, 0777, true);
        }

        if ($this->mime === '.svg') {
            move_uploaded_file($this->image->path(), $folder_path_130 . '/' . $this->file_name);
            copy($folder_path_130 . '/' . $this->file_name, $folder_path_original . '/' . $this->file_name);
            return;
        }
        $image = Image::make($this->media->getRealPath());
        $image->save($folder_path_original . '/' . $this->file_name, 70);
        $image->fit(130, 130);
        $image->save($folder_path_130 . '/' . $this->file_name, 70);
    }
}
