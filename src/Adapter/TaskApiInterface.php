<?php

namespace CalendArt\Adapter;

use CalendArt\AbstractTask;
use Doctrine\Common\Collections\Collection;

interface TaskApiInterface
{
    /**
     * Get all the tasks available.
     *
     * @return Collection<AbstractTask>
     */
    public function getList();

    /**
     * Returns the specific information for a given task
     *
     * @param mixed $identifier Identifier of the task to fetch
     *
     * @return AbstractTask
     */
    public function get($identifier);

    /**
     * Make a task persistent within the provider
     * $options is an array containing request's specific options
     *
     * @param AbstractTask $task
     * @param array $options
     *
     * @return void
     */
    public function persist(AbstractTask $task, array $options = []);
}