<?php

namespace App\Models;

use App\Models\Jobs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $hidden = ['password'];

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }
}
