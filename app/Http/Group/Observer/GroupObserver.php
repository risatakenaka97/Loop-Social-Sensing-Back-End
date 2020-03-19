<?php

namespace App\Http\Group\Observer;

use App\Http\Group\Model\Group;

class GroupObserver {

    public function created(Group $organization)
    {
        //TODO send notification email
    }

}
