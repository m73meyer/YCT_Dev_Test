<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'document', 'status'];

    protected static function boot()
    {
        parent::boot();
        Customer::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }    

}
