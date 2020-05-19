<?php

namespace App\Http\Feedback\Observer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackObserver {

    public function creating($feedback)
    {
        $feedback->uuid = '#'.DB::getPdo()->lastInsertId();
        $feedback->user_id = Auth::id();
    }
}
