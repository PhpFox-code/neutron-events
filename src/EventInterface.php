<?php

namespace Phpfox\EventManager;

/**
 * Interface EventInterface
 *
 * @package Phpfox\EventManager
 */
interface EventInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getTarget();

    /**
     * @param mixed $target
     *
     * @return $this
     */
    public function setTarget($target);

    /**
     * @return array
     */
    public function getParams();

    /**
     * @param array $params
     *
     * @return $this
     */
    public function setParams($params);

    /**
     * @return boolean
     */
    public function isStopPropagation();

    /**
     * @param boolean $flag
     *
     * @return $this
     */
    public function setStopPropagation($flag);
}