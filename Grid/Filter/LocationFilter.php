<?php

declare(strict_types=1);

namespace Owl\Component\Core\Grid\Filter;

use Sylius\Component\Grid\Data\DataSourceInterface;
use Sylius\Component\Grid\Filtering\FilterInterface;

final class LocationFilter implements FilterInterface
{
    public function apply(DataSourceInterface $dataSource, string $name, $data, array $options): void
    {
        if (empty($data) || empty($data['city']) || empty($data['distance'])) {
            return;
        }

        $expressionBuilder = $dataSource->getExpressionBuilder();

        $dataSource->restrict(
            '(
            6371 * acos( 
                cos( radians( ' . $data['latitude'] . ' ) ) * 
                cos( radians( ' . $options['fields']['latitude'] . ' ) ) * 
                cos( radians( ' . $options['fields']['longitude'] . ' ) - radians( ' . $data['longitude'] . ' ) ) + sin( radians( ' . $data['latitude'] . ' ) ) 
                * sin( radians( ' . $options['fields']['latitude'] . ' ) ) 
            )) < ' . $data['distance'],
        );
    }
}
