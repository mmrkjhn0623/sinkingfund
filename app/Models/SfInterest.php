<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SfInterest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $sfloans = 'sf_interests';
    protected $primaryKey = 'interest_id'; // Change to the actual primary key column
    public $incrementing = true; // Ensure it's set to true if using auto-increment
    protected $keyType = 'int'; // Or 'string' if primary key is not an integer
}
