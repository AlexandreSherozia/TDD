<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19/07/2018
 * Time: 14:34
 */

namespace App\Entity;


use PHPUnit\Framework\TestCase;

/**
 * Class MoleculeTest
 * @package App\Entity
 * $molecule = new Molecule('glucide')
 * $molecule->addAtom(new Atom('Carbon', 'C'))
 * ->addAtom(new Atom('Carbon', 'C'))
 * $molecule->getAtomes(); //retourne un array d'atomes
 * $molecule->merge()
 *
 *
 *
 */
class MoleculeTest extends TestCase
{
    public function testMoleculecanBeInstantiated()
    {
        $this->assertInstanceOf(
            Molecule::class,
            new Molecule('glucide'));
    }

    public function testMoleculecanBeAddedInMolecule()
    {
        $atom = $this->createMock(Atom::class);

        $molecule = new Molecule('glucide');
        $molecule->addAtom($atom);

        $this->assertSame($molecule, $molecule->addAtom($atom));
        $this->assertContainsOnlyInstancesOf(Atom::class, $molecule->getAtoms());
    }

    public function testMoleculeCannotContainOnlyOneAtom()
    {
        $this->expectException(\LogicException::class);

        $atom = $this->getMockBuilder(Atom::class)
            ->disableOriginalConstructor()
            ->setMethods(['getSymbol'])
            ->getMock();

        $molecule = new  Molecule('glucide');
        $molecule->addAtom($atom);
        $molecule->getName();
    }

    public function testMoleculecanBeMerged()
    {
        $carbon = $this->createConfiguredMock(Atom::class, [
            'getSymbole' => 'C'
        ]);

        $oxygen = $this->createConfiguredMock(Atom::class, [
            'getSymbole' => 'O'
        ]);

        $molecule = new Molecule('glucide');
        $molecule->addAtom($carbon)
            ->addAtom($oxygen);
        $molecule->merge();
        $molecule->merge();
        $this->assertEquals('CO', $molecule->getName());
    }
   /* public function testMoleculecanBeInstantiated(){}*/
}