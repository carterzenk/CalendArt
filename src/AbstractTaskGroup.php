<?php

namespace CalendArt;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

abstract class AbstractTaskGroup
{
    /** @var string task group's name */
    protected $name;

    /** @var Collection<AbstractTask> Collection of tasks */
    protected $tasks;

    /**
     * AbstractTaskGroup constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->tasks = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param AbstractTask $task
     * @return $this
     */
    public function addTask(AbstractTask $task)
    {
        if ($this->tasks->contains($task)) {
            return $this;
        }

        $this->tasks->add($task);

        return $this;
    }

    /**
     * @param AbstractTask $task
     * @return $this
     */
    public function detachTask(AbstractTask $task)
    {
        $this->tasks->removeElement($task);

        return $this;
    }
}
