<?php

namespace App\Http\Group\Model;

use App\Http\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    protected $table = 'groups';

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
        return $this->hasMany(User::class,  'group_id');
    }

    public function administrator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getMembersAttribute() : array
    {
        return $this->users()
                ->where('approved', TRUE)
                ->select('id', 'name')
                ->get()
                ->toArray() ?? [];
    }

}
