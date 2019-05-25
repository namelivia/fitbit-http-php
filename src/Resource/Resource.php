<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Resource;

class TrackerResource extends AbstractResource
{
	protected function getPath() {
		return 'activities/tracker/';
	}
}
