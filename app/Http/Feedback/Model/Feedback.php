<?php

namespace App\Http\Feedback\Model;

use App\Http\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {

    protected $table = 'feedback';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'uuid',
        'user_id',
        'feeling',
        'comment',
        'publicity'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
