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
    
    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);
        
        parent::delete();
    } 

}
