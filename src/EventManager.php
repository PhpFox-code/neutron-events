<?php

namespace Phpfox\EventManager;

/**
 * Class EventManager
 *
 * @package Phpfox\EventManager
 */
class EventManager implements EventManagerInterface
{
    /**
     *
     * Subscribed events and their listeners
     *
     * [
     *    'onItemStart': 'ListenerClassName',
     * ]
     *
     * @var array[]
     */
    protected $events = [];

    /**
     * @inheritdoc
     */
    public function trigger($eventName, $target = null, $params = [])
    {
        if (empty($this->events[$eventName])) {
            return null;
        }
        return $this->triggerListeners(new Event($eventName, $target, $params));
    }

    /**
     * @param EventInterface $event
     * @param callable       $callback
     *
     * @return Response
     */
    public function triggerListeners(EventInterface $event, $callback = null)
    {
        $name = $event->getName();

        // Initial value of stop propagation flag should be false
        $event->stopPropagation(false);

        $responses = new Response();

        foreach ($this->getListenersByEventName($name) as $listener) {
            $response = $listener($event);
            $responses->push($response);

            // If the event was asked to stop propagating, do so
            if ($event->propagationIsStopped()) {
                $responses->setStopped(true);
                break;
            }

            // If the result causes our validation callback to return true,
            // stop propagation
            if ($callback && $callback($response)) {
                $responses->setStopped(true);
                break;
            }
        }

        return $responses;
    }

    /**
     * @inheritdoc
     */
    public function triggerEvent(EventInterface $event)
    {
        if (empty($this->events[$event->getName()])) {
            return null;
        }

        return $this->triggerListeners($event);
    }

    /**
     * @inheritdoc
     */
    public function triggerUntil(
        $callback,
        $eventName,
        $target = null,
        $argv = []
    ) {
        // TODO: Implement triggerUntil() method.
    }

    /**
     * @inheritdoc
     */
    public function triggerEventUntil($callback, EventInterface $event)
    {
        // TODO: Implement triggerEventUntil() method.
    }

    /**
     * @inheritdoc
     */
    public function attach($eventName, $listener, $priority = 1)
    {
        $this->events[$eventName][((int)$priority) . '.0'][] = $listener;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function detach($listener, $eventName = null)
    {
        // TODO: Implement detach() method.
    }

    /**
     * @inheritdoc
     */
    public function clearListeners($eventName)
    {
        if (isset($this->events[$eventName])) {
            unset($this->events[$eventName]);
        }
        return $this;
    }


}