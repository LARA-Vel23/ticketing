<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'banks';

    protected $fillable = [
        'user_id',
        'name',
        'account_name',
        'account_number',
        'bank_ifsc',
        'bank_swift',
        'bank_branch',
        'bank_branch_code',
        'status',
        'is_system_generated',
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
