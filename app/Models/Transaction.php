<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function scopeFilter($query, $filter)
    {
        return
            $query
                ->when(isset($filter['reference']), function($q) use($filter){
                    $q->where('reference', 'LIKE', '%'.$filter['reference'].'%');
                })

                ->when(isset($filter['currency_id']), function($q) use($filter){
                    $currency = Currency::select(['id', 'country_id'])->find($filter['currency_id']);
                    $country = Country::select(['id'])->find($currency->country_id);
                    $q->where('country_id', $country->id);
                })
                ->when(isset($filter['provider']), function($q) use($filter){
                    $q->where('bank_id', $filter['provider']);
                })
                ->when(isset($filter['type']), function($q) use($filter){
                    $q->where('type', $filter['type']);
                })
                ->when(isset($filter['status']), function($q) use($filter){
                    $q->where('status', $filter['status']);
                })

                ->when(isset($filter['bank']), function($q) use($filter){
                    $q->where('bank', 'LIKE', '%'.$filter['bank'].'%');
                })
                ->when(isset($filter['account_name']), function($q) use($filter){
                    $q->where('account_name', 'LIKE', '%'.$filter['account_name'].'%');
                })
                ->when(isset($filter['account_number']), function($q) use($filter){
                    $q->where('account_number', 'LIKE', '%'.$filter['account_number'].'%');
                })
                ->when(isset($filter['bank_reference']), function($q) use($filter){
                    $q->where('bank_reference', 'LIKE', '%'.$filter['bank_reference'].'%');
                })

                ->when(isset($filter['request_date_from']), function($q) use($filter){
                    $q->where(DB::raw('created_at + INTERVAL 8 hour'), '>=', $filter['request_date_from']);
                })
                ->when(isset($filter['request_date_until']), function($q) use($filter){
                    $q->where(DB::raw('created_at + INTERVAL 8 hour'), '<=', $filter['request_date_until']);
                })
                ->when(isset($filter['processed_date_from']), function($q) use($filter){
                    $q->where(DB::raw('updated_at + INTERVAL 8 hour'), '>=', $filter['processed_date_from']);
                })
                ->when(isset($filter['processed_date_until']), function($q) use($filter){
                    $q->where(DB::raw('updated_at + INTERVAL 8 hour'), '<=', $filter['processed_date_until']);
                });
    }

    public function getReadableStatusAttribute(){
        if($this->attributes['status'] == 1){
            return 'Pending';
        }
        if($this->attributes['status'] == 2){
            return 'Confirmed';
        }
        if($this->attributes['status'] == 3){
            return 'Declined';
        }
    }
}
