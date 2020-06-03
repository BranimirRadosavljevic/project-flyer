<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['name', 'path', 'thumbnail_path'];  
    
    public function flyer()
    {
        return $this->belongsTo(Flyer::class); 
    }
   
    public function baseDir()
    {
        return 'images';        
    } 

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        
        $this->path = $this->baseDir().'/'. $name;
        $this->thumbnail_path = $this->baseDir().'/tn'. $name;
    } 
    
    // public function upload()
    // {
    //     $this->makeThumbnail();

    //     return $this;
    // }

    protected function makeThumbnail()
    {
        //Image::make(sprintf("%s/%s", $this->baseDir, $this->name))->fit(200)->save(sprintf("%s/tn-%s", $this->baseDir, $this->name));
        //Image::make($this->path)->fit(200)->save($this->thumbnail_path);
    }

}
