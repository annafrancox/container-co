<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = ["id", "name"];

    public function banner(){
        return $this->belongsTo(Content::class, 'content_id');
    }

    public function contents(){
        return $this->hasMany(Content::class, 'box_id');
    }

    public function defaultBanner(){
        return '/img/banner.gif';
    }

    public function getBannerViewAttribute(){
        if($this->banner != null && file_exists($this->banner->file_path)){
            return $this->banner->file_path;
        }
        return static::defaultBanner();
    }

    public function Type($type){
        if($this->contents != null){
            return $this->contents->filter(function($content) use ($type) { return strstr($content->type,'image/');})->first();
        }
        return null;
    }

    
}
