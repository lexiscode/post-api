<?php

namespace App\Traits;

trait HasTableName
{
    /** @inheritdoc */
    // @see https://phpstan.org/blog/solving-phpstan-error-unsafe-usage-of-new-static
    final public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function getTableName(): string
    {
        return (new static)->getTable();
    }
}
