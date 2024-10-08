<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IP extends Model
{
    use HasFactory;

    protected $table = 'ip_addresses';

    protected $fillable = [
        'id	',
        'user_id',
        'value',
        'created_at',
        'updated_at'
    ];

    public function getReadableCreatedDateAttribute(){
        return date('F j, Y', strtotime($this->attributes['created_at']));
    }

    public function getReadableUpdatedDateAttribute(){
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
}
