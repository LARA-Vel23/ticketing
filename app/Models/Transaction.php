<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'merchant_id',
        'country_id',
        'bank_id',
        'admin_id',
        'bank',
        'account_name',
        'account_number',
        'bank_ifsc',
        'bank_swift',
        'bank_branch',
        'bank_branch_code',
        'bank_reference',
        'reference',
        'type',
        'status',
        'amount',
        'remarks',
        'notify',
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

    public function scopeMerchant($query, $id)
    {
        return $query->where('merchant_id', $id);
    }

    public function scopeProcessed($query)
    {
        return $query->whereIn('status', [2, 3]);
    }
}
