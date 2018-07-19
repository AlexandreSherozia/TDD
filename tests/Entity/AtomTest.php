<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19/07/2018
 * Time: 12:31
 */

namespace App\Tests\Entity;

use App\Entity\Atom;
use PHPUnit\Framework\TestCase;

/**
 * Class AtomTest
 * @package App\Tests\Entity
 * $atom = new Atom("Carbonne", "C") //Le symbole doit faire au max 2 caractères
 * $atom->getName
 */
class AtomTest extends TestCase
{

    public function testAtomCanBeCreated()
    {
        $atom = new Atom('Carbon', 'C');
        $this->assertInstanceOf(Atom::class, $atom);
        /*$this->assertTrue(true);*/
    }

    public function testAtomHasAName()
    {
        $atom = new atom('Carbon', 'C');
        $this->assertEquals('Carbon', $atom->getName());
        $this->assertEquals('C', $atom->getSymbole());
    }
    public function testAtomHasASymbol()
    {
        $atom = new Atom('Carbon', 'C');
    }

    public function testCanNotHaveSymbolMoreThanTwoCharacters()
    {
        $this->expectException(\LengthException::class);
        $atom = new Atom('Carbon', 'C');
    }

    public function testCanNotBeCreatedWithoutNameAndSymbol()
    {

    }


}