<?php

namespace Zendrop\Tiktok\DTO;

interface DtoInterface
{
    /**
     * @param array<string, mixed> $data
     * @return $this
     */
    public static function fromResponse(array $data): static;

    /**
     * Creates a list of dto from ClickFunnels response.
     *
     * @param array<string, mixed> $entityList
     * @return static[]
     */
    public static function arrayFromResponse(array $entityList): array;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
