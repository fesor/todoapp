<?php

namespace App\Domain\Criteria;

use Doctrine\Common\Collections\Criteria;

class PendingTaskCriteria extends Criteria
{
    public function __construct()
    {
        parent::__construct();

        $this->where(Criteria::expr()->eq('pending', true));
    }
}
