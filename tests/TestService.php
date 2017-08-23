<?php
/**
 * @copyright Copyright (c) Wizacha
 * @license Proprietary
 */
declare(strict_types = 1);

namespace Wizaplace\Tests;

use Wizaplace\AbstractService;

/**
 * Dummy service, here to test generic features not tied to any specific service
 */
final class TestService extends AbstractService
{
    public function getTest()
    {
        return $this->client->get('/test');
    }
}
