<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19/07/2018
 * Time: 14:43
 */

namespace App\Entity;


class Molecule
{
    private $atoms = [], $name;

    /**
     * Molecule constructor.
     */
    public function __construct($string)
    {
    }

    public function addAtom(Atom $atom)
    {
        $this->atoms[] = $atom;

        return $this;
    }

    public function getAtoms()
    {
        return $this->atoms;
    }

    public function merge()
    {
        if (count($this->atoms) < 2 ) {
            throw new \LogicException("Il n'y a pas assez d'atomes dans la molecules");
        }

        $this->name = '';
        foreach($this->atoms as $atom){
            $this->name .= $atom->getSymbole();
        }
    }

    public function getName()
    {
        if (null=== $this->name) {
            $this->merge();
        }

        return $this->name;
    }
}