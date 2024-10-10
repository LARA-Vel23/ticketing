<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';

    public $timestamps = false;

    protected $fillable = [
        'id	',
        'country_id',
        'sign',
        'name',
        'code',
        'created_at',
        'updated_at'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($query) use($search){
            $query->where('value', 'LIKE', '%'.$search.'%');
        });
    }
    public function getReadableCreatedDateAttribute(){
        return date('F j, Y', strtotime($this->attributes['created_at']));
    }
    public function getReadableUpdatedDateAttribute(){
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
    // public function country(): HasOne
    // {
    //     return $this->hasOne(Country::class, 'id');
    // }
}
