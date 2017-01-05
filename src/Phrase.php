<?php

namespace LionNet\Linguistics\Grammar;

/**
 * Phrase
 *
 * @author Maciej Lew <maciej.lew@lion.net.pl>
 * @package linguistics-grammar
 */
class Phrase
{
    /** @var PhrasePart[] Phrase parts */
    private $parts;
    
    public function appendPart(PhrasePart $part)
    {
        $this->parts[] = $part;
    }
    
    public function getString()
    {
        $this->checkPhraseCanBeConvertedToStringOrWords();
        $string = array();
        foreach ($this->parts as $part) {
            $string[] = $part->getString();
        }
        return implode(' ', $string);
    }
    
    public function getWords()
    {
        $this->checkPhraseCanBeConvertedToStringOrWords();
        $words = array();
        foreach ($this->parts as $part) {
            $words = array_merge($words, $part->getWords());
        }
        return $words;
    }
    
    private function checkPhraseCanBeConvertedToStringOrWords()
    {
        if (empty($this->parts)) {
            throw new \DomainException('empty phrase cannot be converted to string');
        }
    }
    
}
