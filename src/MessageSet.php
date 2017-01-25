<?php

namespace CalendArt;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class MessageSet
{
    /**
     * @var string
     */
    protected $nextPageToken;

    /**
     * @var ArrayCollection
     */
    protected $messages;

    /**
     * MessageSet constructor.
     * @param $nextPageToken
     */
    public function __construct($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;

        $this->messages = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param AbstractMessage $message
     * @return $this
     */
    public function addMessage(AbstractMessage $message)
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
        }

        return $this;
    }

    /**
     * @param AbstractMessage $message
     */
    public function detachMessage(AbstractMessage $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * @return ArrayCollection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param Collection $messages
     */
    public function setMessages(Collection $messages)
    {
        $this->messages = $messages;
    }
}
