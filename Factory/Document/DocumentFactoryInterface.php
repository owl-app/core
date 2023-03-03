<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document;

use Owl\Component\Core\Factory\Document\Params\DocumentParamsInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfiguration;

interface DocumentFactoryInterface
{
    public function createDocument(DocumentParamsInterface $params = null): DocumentInterface;
}