<?php

/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

declare(strict_types=1);

namespace Wizaplace\SDK\Image;

use Psr\Http\Message\UriInterface;

interface ImageServiceInterface
{
    /**
     * Return the public URL of an image.
     *
     * The URL returned can be used to display the image, for example by using an
     * <img src="..."> tag in HTML code.
     *
     * @param int $imageId
     * @param int|null $width You can optionally constraint the max width of the image.
     * @param int|null $height You can optionally constraint the max height of the image.
     *
     * @return UriInterface Image URL
     */
    public function getImageLink(int $imageId, int $width = null, int $height = null): UriInterface;
}
