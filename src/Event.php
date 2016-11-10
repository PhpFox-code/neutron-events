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
    protected $name;

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
    protected $stopPropagation = false;

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
        return $this->stopPropagation;
    }

    /**
     * @inheritdoc
     */
    public function setStopPropagation($flag)
    {
        $this->stopPropagation = (bool)$flag;
        return $this;
    }
}