<?php

namespace App\Http\Organization\Model;

use App\Http\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model {

    protected $table = 'organizations';

    protected $appends = [
        'members'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'website',
        'type',
        'verified'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class,  'organization_id');
    }

    public function administrator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getMembersAttribute() : array
    {
        return $this->users()
                ->where('approved', TRUE)
                ->select('id', 'firstName', 'lastName')
                ->get()
                ->toArray() ?? [];
    }

}
