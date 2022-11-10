<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_type_id',
        'price',
        'expense_date',
        'image'
    ];
    protected $appends =['image'];
    protected function getImageAttribute($value)
    {
            return    asset('storage/' . $value);     
        
    }

    public function expense_type () {
        return $this->belongsTo(ExpenseType::class);
    }
}
