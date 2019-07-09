<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Resource;

class Resource extends AbstractResource
{
    protected function getPath() {
        return 'activities/';
    }
}
