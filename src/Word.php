<?php

namespace LionNet\Linguistics\Grammar;

/**
 * Word
 *
 * @author Maciej Lew <maciej.lew@lion.net.pl>
 * @package linguistics-grammar
 */
class Word
{
    
    private $string;

    /**
     * @param string $string Word string
     */
    public function __construct(string $string)
    {
        $this->checkSpaces($string);
        $this->checkAlpha($string);
        $this->string = $string;
    }
    
    /**
     * @return string
     */
    public function getString()
    {
        return $this->string;
    }
    
    /**
     * @param string $string Word string
     * @throws \DomainException if space found
     */
    private function checkSpaces(string $string)
    {
        if (strpos($string, ' ') !== false) {
            throw new \DomainException('Invalid string (space char found)!');
        }
    }
    
    /**
     * @param string $string Word string
     * @throws \DomainException if non-alpha char found
     */
    private function checkAlpha(string $string)
    {
        if (strpos($string, '-') !== false) {
            array_map(function ($a) { $this->checkAlpha($a); }, explode('-', $string));
        } elseif (!ctype_alpha($string)) {
            throw new \DomainException('Invalid string (non-alpha char found)!');
        }
    }

}
