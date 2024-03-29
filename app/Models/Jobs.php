<?php

namespace App\Models;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'job_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function recluiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function isApplied($id)
    {
        return $this->candidates->contains('candidate_id', $id);
    }
}
