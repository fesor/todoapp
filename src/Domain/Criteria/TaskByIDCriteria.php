<?php

namespace App\Domain\Criteria;

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Expression;

class TaskByIDCriteria extends Criteria
{
    public function __construct(string $id)
    {
        parent::__construct();

        $this->where(Criteria::expr()->eq('id', $id));
    }
}
