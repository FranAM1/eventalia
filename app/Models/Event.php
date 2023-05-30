<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'image',
        'address',
        'max_participants',
        'city_id',
        'province_id',
        'category_id',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getNumberParticipants()
    {
        return $this->participants()->count();
    }

    public function isUserRegistered($user)
    {
        return $this->participants()->where('user_id', $user->id)->exists();
    }

    public function isFull()
    {
        return $this->getNumberParticipants() >= $this->max_participants;
    }

    public function isActive()
    {
        $currentDate = Carbon::now();
        return $currentDate->betweenIncluded($this->start_date, $this->end_date);

    }

    public function isFinished()
    {
        $currentDate = Carbon::parse(date('Y-m-d H:i:s'));

        return $currentDate->isAfter($this->end_date);
    }
}
