<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;


    protected $casts = ['last_day' => 'date'];

    protected $fillable = [
        'title',
        'category_id',
        'salary_id',
        'company',
        'description',
        'last_day',
        'image',
        'user_id',
        'published'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function salary()
    {
        return $this->hasOne(Salary::class, 'id', 'salary_id');
    }
}
