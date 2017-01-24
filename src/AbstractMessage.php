<?php

namespace CalendArt;

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
     * @var array
     */
    protected $recipients;

    /**
     * @var string
     */
    protected $from;

    /**
     * AbstractMessage constructor.
     */
    public function __construct()
    {
        $this->recipients = [];
    }

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
     * @param string $preview
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;
    }

    /**
     * @return string
     */
    public function getHtmlBody()
    {
        return $this->htmlBody;
    }

    /**
     * @param string $htmlBody
     */
    public function setHtmlBody($htmlBody)
    {
        $this->htmlBody = $htmlBody;
    }

    /**
     * @return string
     */
    public function getTextBody()
    {
        return $this->textBody;
    }

    /**
     * @param string $textBody
     */
    public function setTextBody($textBody)
    {
        $this->textBody = $textBody;
    }

    /**
     * @return mixed
     */
    public function getSentDate()
    {
        return $this->sentDate;
    }

    /**
     * @param mixed $sentDate
     */
    public function setSentDate(\DateTime $sentDate)
    {
        $this->sentDate = $sentDate;
    }

    /**
     * @return mixed
     */
    public function getRecipients()
    {
        return $this->recipients;
    }

    /**
     * @param string $recipient
     */
    public function addRecipient($recipient)
    {
        $this->recipients[] = $recipient;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }
}