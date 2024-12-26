<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SfLoan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $sfloans = 'sf_loans';
    protected $primaryKey = 'loan_id'; // Change to the actual primary key column
    public $incrementing = true; // Ensure it's set to true if using auto-increment
    protected $keyType = 'int'; // Or 'string' if primary key is not an integer

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
