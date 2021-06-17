<?php

namespace Codememory\Components\Collectors;

use Codememory\Components\Collectors\Interfaces\CssCollectorInterface;

/**
 * Class BlockElements
 *
 * @package Codememory\Components\Collectors
 *
 * @author  Codememory
 */
class BlockElements
{

    /**
     * @var CssCollectorInterface
     */
    private CssCollectorInterface $cssCollector;

    /**
     * @var string|null
     */
    private ?string $modifierLastAddedBlock = null;

    /**
     * @var string|null
     */
    private ?string $stylesWithHtmlElements = null;

    /**
     * BlockElements constructor.
     *
     * @param CssCollectorInterface $cssCollector
     */
    public function __construct(CssCollectorInterface $cssCollector)
    {

        $this->cssCollector = $cssCollector;

    }

    /**
     * @param string $modifier
     * @param array  $styles
     *
     * @return $this
     */
    public function addNewBlock(string $modifier, array $styles): BlockElements
    {

        $this->modifierLastAddedBlock = $modifier;

        $this->handlerAddElement($modifier, $styles);

        return $this;

    }

    /**
     * @param string $modifier
     * @param array  $styles
     *
     * @return $this
     */
    public function addBlockToLast(string $modifier, array $styles): BlockElements
    {

        $this->handlerAddElement($this->modifierLastAddedBlock.$modifier, $styles);

        return $this;

    }

    /**
     * @return string|null
     */
    public function getElements(): ?string
    {

        return $this->stylesWithHtmlElements;

    }

    /**
     * @return $this
     */
    public function clear(): BlockElements
    {

        $this->stylesWithHtmlElements = null;

        return $this;

    }

    /**
     * @param string $modifier
     * @param array  $styles
     *
     * @return void
     */
    private function handlerAddElement(string $modifier, array $styles): void
    {

        $styleStringWithElement = sprintf("%s {\n%s\n}\n", $modifier, $this->cssCollector->toString($styles, true));

        $this->stylesWithHtmlElements .= $styleStringWithElement;

    }

}