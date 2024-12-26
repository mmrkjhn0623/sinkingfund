<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SfCreditpay extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'creditpay_id';
    protected $sfcreditpay = 'sf_creditpays';

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
