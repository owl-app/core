<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document;

use Owl\Component\Core\Factory\Document\Params\DocumentParamsInterface;

interface DocumentFactoryInterface
{
    public function createDocument(DocumentParamsInterface $params = null): DocumentInterface;
}