<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    public function Expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
