<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19/07/2018
 * Time: 12:41
 */

namespace App\Entity;


class Atom
{
    private $atom, $symbol;

    /**
     * Atom constructor.
     * @param $atom
     * @param $symbol
     */
    public function __construct($atom, $symbol)
    {


       if (strlen($symbol) > 2) {
           throw new \LengthException(sprintf(
               "Le symbole %s n\'est pas valide", $symbol
           ));
       }

        $this->atom = $atom;
        $this->symbol = $symbol;
    }

    //Installer Code coverage

    public function getName()
    {
        return 'Carbonne';
    }

    public function getSymbole()
    {
        return 'C';
    }
}