<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Booking extends Model
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
        'user_id', 'pod_name', 'discount_percentage',
        'pay_amount', 'transaction_at'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Uuid::generate(4)->string;
        });
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
