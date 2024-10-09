<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeIsAdmin($query)
    {
        return $query->where('is_admin', 1);
    }

    public function scopeIsMerchant($query)
    {
        return $query->where('is_admin', 0);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($query) use($search){
            $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
        });
    }

    public function scopefilterStatus($query, $status)
    {
        return $query->when($status, function($query) use($status){
            $query->where('status', ($status == 1 ? 1 : 0) );
        });
    }

    public function getReadableStatusAttribute(){
        return $this->attributes['status'] == 1 ? 'Active' : 'Deactivated';
    }

    public function getReadableCreatedDateAttribute(){
        return date('F j, Y', strtotime($this->attributes['created_at']));
    }

    public function getReadableUpdatedDateAttribute(){
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    public function roles(): HasMany
    {
        return $this->hasMany(UserRole::class);
    }

    public function permissions(): HasMany
    {
        return $this->hasMany(UserPermission::class);
    }

    public function getUserRolesAttribute(){
        $array = [];
        foreach(UserRole::where('user_id', $this->attributes['id'])->get() as $userRole)
        {
            array_push($array, '<span class="badge bg-secondary">' . $userRole->role->name . '</span>');
        }
        return $array ? implode(" ",$array) : '';
    }
}
