<?php

namespace Zendrop\Tiktok\DTO;

use Zendrop\Data\DataInterface;
use Zendrop\Data\DataTrait;
use Zendrop\Data\ToArrayInterface;
use Zendrop\Data\ToArrayTrait;

abstract class BaseDTO implements DtoInterface, DataInterface, ToArrayInterface
{
    use ToArrayTrait;
    use DataTrait;

    /**
     * {@inheritDoc}
     */
    public static function fromResponse(array $data): static
    {
        /** @phpstan-ignore-next-line */
        return static::from($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function arrayFromResponse(array $entityList): array
    {
        $dtoCollection = [];

        foreach ($entityList as $entity) {
            $dtoCollection[] = static::fromResponse($entity);
        }

        return $dtoCollection;
    }
}
