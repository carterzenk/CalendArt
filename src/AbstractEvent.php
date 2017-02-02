<?php
/**
 * This file is part of the CalendArt package
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @copyright Wisembly
 * @license   http://www.opensource.org/licenses/MIT-License MIT License
 */

namespace CalendArt;

use DateTime,
    InvalidArgumentException;

use Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * Represents an Event in a Calendar
 *
 * Like all generic objects, this object should be extended by the adapter
 *
 * @author Baptiste Clavié <baptiste@wisembly.com>
 */
abstract class AbstractEvent
{
    /** @var Datetime Start date of this event */
    protected $start;

    /** @var Datetime End date of this event */
    protected $end;

    /** @var string name of this event */
    protected $name;

    /** @var string Description of this event */
    protected $description;

    /** @var User owner of this event */
    protected $owner;

    /** @var AbstractCalendar Calendar associated to this event */
    protected $calendar;

    /** @var Collection<EventParticipation> Participations registered to this event */
    protected $participations;

    public function __construct(AbstractCalendar $calendar, User $owner, $name, DateTime $start, DateTime $end)
    {
        $this->name     = $name;
        $this->owner    = $owner;
        $this->calendar = $calendar;

        $this->participations = new ArrayCollection;

        if ($start > $end) {
            throw new InvalidArgumentException('An event cannot start after it was ended');
        }

        $this->end   = $end;
        $this->start = $start;

        $owner->addEvent($this);
        $calendar->getEvents()->add($this);
    }

    /** @return mixed */
    abstract public function getId();

    /** @return string */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /** @return string */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /** @return User */
    public function getOwner()
    {
        return $this->owner;
    }

    /** @return DateTime */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param DateTime $start
     * @return $this
     */
    public function setStart(DateTime $start)
    {
        if (isset($this->end) && $this->end < $start) {
            throw new InvalidArgumentException('An event cannot start after it was ended');
        }

        $this->start = $start;

        return $this;
    }

    /** @return DateTime */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param DateTime $end
     * @return $this
     */
    public function setEnd(DateTime $end)
    {
        if (isset($this->start) && $this->start > $end) {
            throw new InvalidArgumentException('An event cannot end before it was started');
        }

        $this->end = $end;

        return $this;
    }

    /**
     * Checks if this event has already ended
     *
     * @param DateTime $current
     * @return bool
     */
    public function hasEnded(DateTime $current = null)
    {
        return $this->end < ($current ?: new DateTime);
    }

    /**
     * Checks if this event has already started
     *
     * @param DateTime $current
     * @return bool
     */
    public function hasStarted(DateTime $current = null)
    {
        return $this->start <= ($current ?: new DateTime);
    }

    /**
     * Checks if this event is currently running
     *
     * @param DateTime $current
     * @return bool
     */
    public function isRunning(DateTime $current = null)
    {
        $current = $current ?: new DateTime;

        return $this->hasStarted($current) && !$this->hasEnded($current);
    }

    /** @return AbstractCalendar */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * Detach this event from the associated Calendar
     *
     * @return $this
     */
    public function detach()
    {
        $this->calendar->getEvents()->removeEvent($this);
        $this->calendar = null;

        return $this;
    }

    /** @return Collection<EventParticipation> */
    public function getParticipations()
    {
        return $this->participations;
    }

    /**
     * @param EventParticipation $participation
     * @return $this
     */
    public function addParticipation(EventParticipation $participation)
    {
        $email = $participation->getUser()->getEmail();

        $callback = function ($key, EventParticipation $participation) use ($email) {
            return $email === $participation->getUser()->getEmail();
        };

        if ($this->participations->exists($callback)) {
            return;
        }

        $this->participations->add($participation);

        return $this;
    }

    /**
     * @param EventParticipation $participation
     * @return $this
     */
    public function removeParticipation(EventParticipation $participation)
    {
        $this->participations->removeElement($participation);

        return $this;
    }
}

