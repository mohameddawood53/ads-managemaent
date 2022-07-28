<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "type",
        "start_date",
        "advertiser_id",
        "category_id",
    ];

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFilterSearch($query , $type, $value)
    {
        $typeWithRelation = [
            "category" => "category",
            "tag" => "tags"
        ];
        return $query->whereHas($typeWithRelation[$type] , function ($q) use ($value){
            $q->where("name" ,$value);
        });
    }
}
