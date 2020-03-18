<?php

namespace App\Http\User\Model;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'administrator',
        'email',
        'city',
        'website',
        'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'created_at',
        'updated_at'
    ];

    public function user() {
        $this->hasMany(User::class);
    }
}
