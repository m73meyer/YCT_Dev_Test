<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Number;

class NumberPreference extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['number_id', 'name', 'value'];

    public function number()
    {
        return $this->belongsTo(Number::class);
    }

}
