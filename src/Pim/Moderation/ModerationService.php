<?php

/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

declare(strict_types=1);

namespace Wizaplace\SDK\Pim\Moderation;

use Wizaplace\SDK\AbstractService;
use Wizaplace\SDK\Exception\UnauthorizedModerationAction;

/**
 * Class ModerationService
 * @package Wizaplace\SDK\Pim\Moderation
 */
class ModerationService extends AbstractService
{
    protected const AUTHORIZED_ACTIONS = ['approve', 'disapprove', 'standby'];

    /**
     * Change moderation state of all products for a company ID
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Wizaplace\SDK\Authentication\AuthenticationRequired
     * @throws \Wizaplace\SDK\Exception\JsonDecodingError
     * @throws UnauthorizedModerationAction
     */
    public function moderateByCompany(int $companyId, string $moderationAction): void
    {
        if (false === \in_array($moderationAction, self::AUTHORIZED_ACTIONS)) {
            throw new UnauthorizedModerationAction(
                'Unauthorized action, must be ' . implode(', ', self::AUTHORIZED_ACTIONS)
            );
        }

        $this->client->mustBeAuthenticated();
        $this->client->put("pim/moderation/companies/{$companyId}/products/{$moderationAction}");
    }

    /**
     * Change moderation state for one product ID
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Wizaplace\SDK\Authentication\AuthenticationRequired
     * @throws \Wizaplace\SDK\Exception\JsonDecodingError
     * @throws UnauthorizedModerationAction
     */
    public function moderateByProduct(int $productId, string $moderationAction): void
    {
        if (false === \in_array($moderationAction, self::AUTHORIZED_ACTIONS)) {
            throw new UnauthorizedModerationAction(
                'Unauthorized action, must be ' . implode(', ', self::AUTHORIZED_ACTIONS)
            );
        }

        $this->client->mustBeAuthenticated();
        $this->client->put("pim/moderation/products/{$productId}/{$moderationAction}");
    }
}
