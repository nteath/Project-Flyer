<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class Photo extends Model
{
    protected $table    = 'flyer_photos';
    protected $fillable = ['path', 'name', 'tn_path'];

    protected $baseDir  = 'uploads/photos';


    public static function newFromForm($name)
    {
        $photo = new static;

        $photo->name    = sprintf('%s_%s', time(), $name);
        $photo->path    = sprintf('%s/%s', $photo->baseDir, $photo->name);
        $photo->tn_path = sprintf('%s/tn-%s', $photo->baseDir, $photo->name);

        return $photo;
    }


    public function upload(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }


    public function makeThumbnail()
    {
        Image::make($this->path)->fit(200)->save($this->tn_path);
    }


    public function flyer()
    {
        return $this->belongsTo(Flyer::class);
    }
}
