<?php

namespace CalendArt\Adapter;

use CalendArt\AbstractMessage;
use Doctrine\Common\Collections\Collection;

interface MailApiInterface
{
    /**
     * Get all the messages available with a search query and page token.
     *
     * @param string $search
     * @param mixed $pageToken
     * @return Collection<AbstractMessage>
     */
    public function getList($search, $pageToken = null);

    /**
     * Returns the specific information for a given task group
     *
     * @param mixed $identifier Identifier of the task group to fetch
     *
     * @return AbstractMessage
     */
    public function get($identifier);
}