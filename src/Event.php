<?php

namespace Phpfox\EventManager;

/**
 * Class Event
 *
 * @package Phpfox\EventManager
 */
class Event implements EventInterface
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var mixed
     */
    protected $target;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @var bool
     */
    protected $stopped = false;

    /**
     * Event constructor.
     *
     * @param string $name
     * @param mixed  $target
     * @param array  $params
     */
    public function __construct($name, $target, $params)
    {
        $this->name = $name;

        if (null != $target) {
            $this->target = $target;
        }
        if (null != $params) {
            $this->params = $params;
        }
    }

    /**
     * @inheritdoc
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @inheritdoc
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @inheritdoc
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isStopPropagation()
    {
        return $this->stopped;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function getParam($name)
    {
        return isset($this->params[$name]) ? $this->params[$name] : null;
    }

    /**
     * @return boolean
     */
    public function isPropagationStopped()
    {
        return $this->stopped;
    }

    /**
     * @return boolean
     */
    public function stopPropagation($flag)
    {
        return $this->stopped = (bool)$flag;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}