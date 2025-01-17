<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['message'];
    protected $guarded = [];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }
}
