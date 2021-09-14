<?php

namespace App\Tests\Core;

use App\Core\Card;
use App\Core\CardGame32;
use PHPUnit\Framework\TestCase;

class CardGame32Test extends TestCase
{
    public function testCompare()
    {

    }

public function testToString2Cards()
    /**
     * va permtre de verifier le nombre de carte par exemple pour le premier on verifie si il ya 2 cartes le deuxieme si il ya 1 carte et le 3eme si il ya 32 carte
     */
{
    $jeudecarte = new CardGame32([new Card('As', 'Pique'), new Card('Rois', 'Coeur')]);
    $this->assertEquals('CardGame32 : 2 carte(s)',$jeudecarte->__toString());
}
public function testToString1Card()
{
    $jeudecarte = new CardGame32([new Card('As', 'Pique')]);
    $this->assertEquals('CardGame32 : 1 carte(s)',$jeudecarte->__toString());
}
public function testToString32Cards()
{
    $cards= CardGame32::factoryCardGame32();
        $this->assertEquals('CardGame32 : 32 carte(s)',$cards->__toString());
}

public function testGetCard()

{
   $card = new CardGame32 ([new Card('Dame' , 'Coeur')]);
   $this->assertEquals(new Card('Dame', 'Coeur') , $card ->getCard('0'));
}
public function testshuffle()
    /**
     * cree deux type de packet de carte un paquet avec 32 carte non melanger et un autre avec un packet de 32 carte melanger
     */
{
$cardGameMelange = CardGame32::factoryCardGame32();
$cardGameMelange->shuffle();
$cardGame = CardGame32::factoryCardGame32();
$this->assertNotEquals($cardGameMelange, $cardGame);
}
}