<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class BookingPageImagesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function create(): \Easymailing\Sdk\Generated\Dto\BookingPageImage_booking_page_image_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/booking_page_images', []), pathTemplate: '/booking_page_images');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPageImage_booking_page_image_read::fromArray($data);
    }

}
