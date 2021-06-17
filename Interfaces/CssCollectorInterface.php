<?php

namespace Codememory\Components\Collectors\Interfaces;

/**
 * Interface CssCollectorInterface
 *
 * @package Codememory\Components\Collectors\Interfaces
 *
 * @author  Codememory
 */
interface CssCollectorInterface
{

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Convert array to css string
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param array $styles
     * @param bool  $makeTransfer
     *
     * @return string
     */
    public function toString(array $styles, bool $makeTransfer = false): string;

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Convert a css string to an array whose key is a css property
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param string $styles
     *
     * @return array
     */
    public function toArray(string $styles): array;

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Combine styles, if the first argument was a string of styles, then the return will
     * be a string of styles, otherwise an array
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param string|array $stylesOne
     * @param array        $stylesTwo
     *
     * @return string|array
     */
    public function combine(string|array $stylesOne, array $stylesTwo): string|array;

}