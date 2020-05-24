<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['path'];

    protected $baseDir = 'images';


    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;
        $name = time() . $file->getClientOriginalName();
        $photo->path = asset($photo->baseDir . '/' . $name);
        $file->move($photo->baseDir, $name);
        return $photo;
    }

    public function flyer()
    {
        return $this->belongsTo(Flyer::class);
    }
}
