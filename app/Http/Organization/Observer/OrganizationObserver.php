<?php

namespace App\Http\Organization\Observer;

use App\Http\Organization\Model\Organization;

class OrganizationObserver {

    public function created(Organization $organization)
    {
        //TODO send notification email
    }

}
