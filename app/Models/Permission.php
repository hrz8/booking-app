<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

use App\Models\User;

class Permission extends Model
{
    use HasFactory;

    /**
     * Disable the increment because using UUID
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'description'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Uuid::generate(4)->string;
        });
    }

    public function users()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'users_permissions',
            'permission_id',
            'user_id'
        );
    }
}
