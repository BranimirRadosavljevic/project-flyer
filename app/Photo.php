<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['name', 'path', 'thumbnail_path'];

    protected $baseDir = 'images';


    public static function named($name)
    {
        $photo = new static;
        return $photo->saveAs($name);
    }

    public function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = asset(sprintf("%s/%s", $this->baseDir, $this->name));
        $this->thumbnail_path = asset(sprintf("%s/tn-%s", $this->baseDir, $this->name));

        return $this;
    }
    
    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail()
    {
        Image::make(sprintf("%s/%s", $this->baseDir, $this->name))->fit(200)->save(sprintf("%s/tn-%s", $this->baseDir, $this->name));
    }

    public function flyer()
    {
        return $this->belongsTo(Flyer::class);
    }
}
