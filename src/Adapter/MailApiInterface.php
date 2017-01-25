<?php

namespace CalendArt\Adapter;

use CalendArt\AbstractMessage;
use CalendArt\MessageSet;

interface MailApiInterface
{
    /**
     * Get all the messages available with a search query and page token.
     *
     * @param string $search
     * @param mixed $pageToken
     * @return MessageSet
     */
    public function getList($search, $pageToken);

    /**
     * Returns the specific information for a given task group
     *
     * @param mixed $identifier Identifier of the task group to fetch
     *
     * @return AbstractMessage
     */
    public function get($identifier);
}