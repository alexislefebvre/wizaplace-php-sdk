<?php
/**
 * @copyright Copyright (c) Wizacha
 * @license Proprietary
 */
declare(strict_types = 1);

namespace Wizaplace\Exception;

use Throwable;

class NotFound extends \Exception
{
    /**
     * @internal
     */
    public function __construct($message = "", Throwable $previous = null)
    {
        parent::__construct($message, 404, $previous);
    }
}
