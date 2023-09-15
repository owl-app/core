<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document;

interface DocumentInterface
{
    public function generateResponse(string $filename, array $data = []);
}
