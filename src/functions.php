<?php

namespace {

    use Phpfox\EventManager\EventManager;

    /**
     * @return EventManager
     */
    function events()
    {
        return EventManager::instance();
    }
}