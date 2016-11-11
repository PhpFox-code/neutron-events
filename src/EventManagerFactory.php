<?php

namespace Phpfox\EventManager;


/**
 * Class EventManagerFactory
 *
 * @package Phpfox\EventManager
 */
class EventManagerFactory
{
    /**
     * @return EventManager
     */
    public function factory()
    {
        return new EventManager();
    }

    /**
     * @return bool
     */
    public function shouldCache()
    {
        return false;
    }
}