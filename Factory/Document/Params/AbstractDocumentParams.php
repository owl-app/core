<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document\Params;

use Owl\Component\Core\Exception\InvalidDocumentConfigurationException;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfiguration;

abstract class AbstractDocumentParams implements DocumentParamsInterface
{
    final public function __construct()
    {
    }

    public static function createFromRequestConfiguration(RequestConfiguration $configuration): static
    {
        $vars = $configuration->getVars();

        if (!isset($vars['document']['options'])) {
            throw new InvalidDocumentConfigurationException('Please set in configuration route vars document options');
        }

        $objectParams = new static();

        foreach ($vars['document']['options'] as $name => $value) {
            $name = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $name))));
            $objectParams->$name = $value;
        }

        return $objectParams;
    }
}
