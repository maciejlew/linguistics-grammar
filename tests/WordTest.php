<?php

namespace LionNet\Linguistics\Grammar\Tests;
use LionNet\Linguistics\Grammar\Word as Word;

/**
 * WordTest
 *
 * @author Maciej Lew <maciej.lew@lion.net.pl>
 * @package linguistics-grammar
 */
class WordTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @return array Test strings
     */
    public function getWordStrings()
    {
        return array(
            array('mail'),
            array('Mail'),
            array('e-mail'),
            array('E-mail'),
        );
    }
    
    /**
     * @return array Test strings
     */
    public function getNonWordStrings()
    {
        return array(
            array('mail!'),
            array('Mail1'),
            array('e mail'),
            array('E mail'),
            array('e-mail marketing'),
        );
    }
    
    /**
     * @dataProvider getWordStrings
     * @param string $string Word string
     */
    public function testWordStringsCanCreateWord(string $string)
    {
        $word = new Word($string);
        $this->assertEquals($string, $word->getString());
    }
    
    /**
     * @dataProvider getNonWordStrings
     * @param string $string Word string
     */
    public function testNonWordStringsCannotCreateWord(string $string)
    {
        $this->expectException(\DomainException::class);
        new Word($string);
    }
    
    public function testWordAskedForWordsReturnsItself()
    {
        $word = new Word('lion');
        $this->assertEquals($word, $word->getWords()[0]);
    }
    
}
