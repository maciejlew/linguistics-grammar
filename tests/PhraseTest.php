<?php

namespace LionNet\Linguistics\Grammar\Tests;

use LionNet\Linguistics\Grammar\Word as Word;
use LionNet\Linguistics\Grammar\Phrase as Phrase;

/**
 * PhraseTest
 *
 * @author Maciej Lew <maciej.lew@lion.net.pl>
 * @package linguistics-grammar
 */
class PhraseTest extends \PHPUnit_Framework_TestCase
{
    
    public function testEmptyPhraseCannotBeConvertedToString()
    {
        $phrase = new Phrase();
        $this->expectException(\DomainException::class);
        $phrase->getString();
    }
    
    public function testEmptyPhraseCannotBeConvertedToWords()
    {
        $phrase = new Phrase();
        $this->expectException(\DomainException::class);
        $phrase->getWords();
    }
    
    public function testWordCanBeAddedToPhrase()
    {
        $word = new Word('lion');
        $phrase = new Phrase();
        $phrase->appendPart($word);
        $this->assertEquals('lion', $phrase->getString());
        $this->assertEquals($word, $phrase->getWords()[0]);
    }
    
    public function testManyWordsCanBeAddedToPhrase()
    {
        $word0 = new Word('lion');
        $word1 = new Word('cat');
        $word2 = new Word('lynx');
        $phrase = new Phrase();
        $phrase->appendPart($word0);
        $phrase->appendPart($word1);
        $phrase->appendPart($word2);
        $this->assertEquals('lion cat lynx', $phrase->getString());
        $this->assertEquals($word0, $phrase->getWords()[0]);
        $this->assertEquals($word1, $phrase->getWords()[1]);
        $this->assertEquals($word2, $phrase->getWords()[2]);
    }
    
}
