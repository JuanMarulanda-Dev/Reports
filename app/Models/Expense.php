<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function ExpenseReport()
    {
        return $this->belongsTo(ExpenseReport::class);
    }
}
