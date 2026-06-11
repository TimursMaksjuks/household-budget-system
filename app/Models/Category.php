<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function financialRecords()
    {
        return $this->hasMany(FinancialRecord::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

    protected $fillable = ['name', 'user_id'];
    
}
