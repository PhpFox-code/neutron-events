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
            'eventManager'            => ['onApplicationConfigChanged'],
            'onAssetManagerGetHeader' => ['eventManager',],
            'onAssetManagerGetFooter' => ['eventManager',],
        ],
    ],
];