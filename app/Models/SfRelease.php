<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SfRelease extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'release_id';
    protected $sfrelease = 'sf_releases';
    public $incrementing = true;

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
