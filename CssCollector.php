<?php

namespace Codememory\Components\Collectors;

use Codememory\Components\Collectors\Interfaces\CssCollectorInterface;
use Codememory\Support\Arr;
use LogicException;

/**
 * Class CssCollector
 *
 * @package Codememory\Components\Collectors
 *
 * @author  Codememory
 */
class CssCollector implements CssCollectorInterface
{

    /**
     * @inheritDoc
     */
    public function toString(array $styles, bool $makeTransfer = false): string
    {

        Arr::map($styles, function (mixed $key, mixed $value) {
            return [$key . ':' . $value];
        });

        return implode($makeTransfer ? ";\n" : ';', $styles) . ';';

    }

    /**
     * @inheritDoc
     */
    public function toArray(string $styles): array
    {

        preg_match_all('/(?<name>[a-z-]+):\s*(?<value>[^;]+);/', $styles, $match);

        if ([] === $match['name']) {
            throw new LogicException('Incorrect css string');
        }

        $styles = [];

        foreach ($match['name'] as $index => $cssProperty) {
            $styles[$cssProperty] = $match['value'][$index];
        }

        return $styles;

    }

    /**
     * @inheritDoc
     */
    public function combine(string|array $stylesOne, array $stylesTwo): string|array
    {

        if (is_array($stylesOne)) {
            return array_merge($stylesOne, $stylesTwo);
        }

        return $stylesOne . $this->toString($stylesTwo);

    }

}