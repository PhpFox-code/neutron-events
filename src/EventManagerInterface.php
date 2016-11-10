<?php

namespace Phpfox\EventManager;

/**
 * Interface EventManagerInterface
 *
 * @package Phpfox\EventManager
 */
interface EventManagerInterface
{
    /**
     * @param string $eventName
     * @param mixed  $target
     * @param array  $params
     *
     * @return Response|null
     */
    public function trigger($eventName, $target = null, $params = []);


    /**
     * @param string $callback
     * @param string $eventName
     * @param mixed  $target
     * @param array  $argv
     *
     * @return Response|null
     */
    public function triggerUntil(
        $callback,
        $eventName,
        $target = null,
        $argv = []
    );

    /**
     * @param EventInterface $event
     *
     * @return Response|null
     */
    public function triggerEvent(EventInterface $event);

    /**
     * @param string         $callback
     * @param EventInterface $event
     *
     * @return Response|null
     */
    public function triggerEventUntil(
        $callback,
        EventInterface $event
    );

    /**
     * @param string $eventName
     * @param string $listener
     * @param int    $priority
     *
     * @return $this
     */
    public function attach($eventName, $listener, $priority = 1);


    /**
     * @param string $listener
     * @param string $eventName
     *
     * @return $this
     */
    public function detach($listener, $eventName = null);

    /**
     * @param $eventName
     *
     * @return $this
     */
    public function clearListeners($eventName);
}