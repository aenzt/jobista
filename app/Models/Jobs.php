<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jobs extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function apply_jobs()
    {
        return $this->belongsToMany(User::class, 'apply_jobs')->withPivot('cover_letter', 'resume')->withTimestamps();
    }
}
