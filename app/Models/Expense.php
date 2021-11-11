<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = "expenses";
    protected $fillable = ['category_id', 'price', 'entry_date'];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
