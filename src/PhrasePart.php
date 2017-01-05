<?php

namespace LionNet\Linguistics\Grammar;

/**
 *
 * @author Maciej Lew <maciej.lew@lion.net.pl>
 * @package linguistics-grammar
 */
interface PhrasePart
{

    public function getString();

    public function getWords();
    
}
