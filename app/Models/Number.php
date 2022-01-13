<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\NumberPreference;

class Number extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['customer_id', 'number', 'status'];

    protected static function boot()
    {
        parent::boot();
        Number::created(function ($model) {
            NumberPreference::create(
                [
                    'number_id' => $model->id,
                    'name'      => 'auto_attendant',
                    'value'     => '1'
                ]);
            NumberPreference::create(
                [
                    'number_id' => $model->id,
                    'name'      => 'voicemail_enabled',
                    'value'     => '1'
                ]
            );
        });
    }    

    public function preferences()
    {
        return $this->hasMany(NumberPreference::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
