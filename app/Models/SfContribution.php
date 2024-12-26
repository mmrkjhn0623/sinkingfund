<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SfContribution extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'contribution_id';
    protected $sfcontribution = 'sf_contributions';

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

}

