<?php

namespace CalendArt\Adapter;

use CalendArt\AbstractTaskGroup;
use Doctrine\Common\Collections\Collection;

interface TaskGroupApiInterface
{
    /**
     * Get all the task groups available with the current connection
     *
     * @return Collection<AbstractTaskGroup>
     */
    public function getList();

    /**
     * Returns the specific information for a given task group
     *
     * @param mixed $identifier Identifier of the task group to fetch
     *
     * @return AbstractTaskGroup
     */
    public function get($identifier);
}