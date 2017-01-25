<?php

namespace CalendArt;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

abstract class AbstractMessage
{
    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $preview;

    /**
     * @var string
     */
    protected $htmlBody;

    /**
     * @var string
     */
    protected $textBody;

    /**
     * @var \DateTime
     */
    protected $sentDate;

    /**
     * @var User
     */
    protected $sender;

    /**
     * @var Collection
     */
    protected $recipients;

    /**
     * AbstractMessage constructor.
     */
    public function __construct()
    {
        $this->recipients = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public abstract function getId();

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * @return string
     */
    public function getHtmlBody()
    {
        return $this->htmlBody;
    }

    /**
     * @return string
     */
    public function getTextBody()
    {
        return $this->textBody;
    }

    /**
     * @return \DateTime|null
     */
    public function getSentDate()
    {
        return $this->sentDate;
    }

    /**
     * @return Collection
     */
    public function getRecipients()
    {
        return $this->recipients;
    }

    /**
     * @param User $recipient
     * @return $this
     */
    protected function addRecipient(User $recipient)
    {
        if (!$this->recipients->contains($recipient)) {
            $this->recipients->add($recipient);
        }

        return $this;
    }

    /**
     * @return User
     */
    public function getSender()
    {
        return $this->sender;
    }
}