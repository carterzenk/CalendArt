<?php

namespace CalendArt;

abstract class AbstractTask
{
    /** @var User owner of this task */
    protected $owner;

    /** @var  AbstractTaskGroup the task group of this task */
    protected $taskGroup;

    /** @var string the name of the task */
    protected $name;

    /** @var string description of the task */
    protected $description;

    /** @var string status of this task */
    protected $status;

    /** @var \DateTime the date the task was completed */
    protected $completed;

    /** @var \DateTime the date the task was created */
    protected $created;

    /** @var \DateTime the date the task is due */
    protected $due;


    /**
     * AbstractTask constructor.
     * @param AbstractTaskGroup $taskGroup
     * @param User $owner
     * @param \DateTime $due
     * @param string $name
     */
    public function __construct(AbstractTaskGroup $taskGroup, User $owner, \DateTime $due, $name)
    {
        $this->taskGroup = $taskGroup;
        $this->owner = $owner;
        $this->due = $due;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public abstract function getId();

    /**
     * @return bool
     */
    public abstract function isCompleted();

    /**
     * @return AbstractTaskGroup
     */
    public function getTaskGroup()
    {
        return $this->taskGroup;
    }

    /**
     * @param AbstractTaskGroup $taskGroup
     * @return $this
     */
    public function setTaskGroup(AbstractTaskGroup $taskGroup)
    {
        $this->taskGroup = $taskGroup;

        return $this;
    }

    /**
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return $this
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;

        return $this;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @param \DateTime $completed
     * @return $this
     */
    public function setCompleted(\DateTime $completed)
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return $this
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDue()
    {
        return $this->due;
    }

    /**
     * @param \DateTime $due
     * @return $this
     */
    public function setDue(\DateTime $due)
    {
        $this->due = $due;

        return $this;
    }

    /**
     * @param \DateTime $current
     * @return bool
     */
    public function isPastDue(\DateTime $current = null)
    {
        return $this->due <= ($current ?: new \DateTime);
    }
}
