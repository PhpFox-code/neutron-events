<?php

namespace Phpfox\EventManager;

return [
    'services' => [
        'map' => [
            'eventManager' => [null, EventManager::class,],
        ],
    ],
    'events'   => [
        'map' => [
            'onApplicationConfigChanged' => ['eventManager'],
        ],
    ],
];