<?php

namespace App\Core;

/**
 * Class CardGame32 : un jeu de cartes.
 * @package App\Core
 * constante qui va permettre de mettre les differente carte dans l'ordre
 */
class CardGame32
{
    const ORDERS_COLORS = ['coeur' =>4, 'carreau' =>3, 'pique'=>2,'trefle'=>1];
    const ORDERS_CARDS = ['as' =>8 ,'rois' =>7, 'dames' =>6, 'valets' =>5, '10' =>4, '9' =>3, '8' =>2, '7' =>1];
  /**
   * @var $cards array a array of Cards
   */
  private $cards;

  /**
   * Guess constructor.
   * @param array $cards
   */
  public function __construct(array $cards)
  {
    $this->cards = $cards;
  }

  /**
   * Brasse le jeu de cartes
   * shuffle melanger les cartes
   */
  public function shuffle()
  {
      return shuffle($this->cards);
  }



  /** définir une relation d'ordre entre instance de Card.
   * à valeur égale (name) c'est l'ordre de la couleur qui prime
   * coeur > carreau > pique > trèfle
   * Attention : si AS de Coeur est plus fort que AS de Trèfle,
   * 2 de Coeur sera cependant plus faible que 3 de Trèfle
   *
   *  Remarque : cette méthode n'est pas de portée d'instance (static)
   *
   * @see https://www.php.net/manual/fr/function.usort.php
   *
   * @param $c1 Card
   * @param $c2 Card
   * @return int
   * <ul>
   *  <li> zéro si $c1 et $c2 sont considérés comme égaux </li>
   *  <li> -1 si $c1 est considéré inférieur à $c2</li>
   * <li> +1 si $c1 est considéré supérieur à $c2</li>
   * </ul>
   *
   */
  public static function compare(Card $c1, Card $c2) : int
  {


    $c1Name = strtolower($c1->getName());
    $c2Name = strtolower($c2->getName());
    $c1Color = strtolower($c1->getColor());
    $c2Color = strtolower($c2->getColor());



    if ($c1Name === $c2Name) {
      if ($c1Color === $c2Color){
         return 0;
      }
       return (self::ORDERS_COLORS[$c1Color]>self::ORDERS_COLORS[$c2Color]) ? +1 :-1;
  } 
   return (self::ORDERS_CARDS[$c1Name]>self::ORDERS_CARDS[$c2Name]) ? +1 :-1;
}

    /**
     * cree des cartes
     * @return CardGame32
     */
 // TODO manque PHPDoc
  public static function factoryCardGame32() : CardGame32 {

      $cardGame = new CardGame32([new Card('As', 'Trefle'), new Card('Rois', 'Trefle'),new Card('Reine', 'Trefle'),new Card('Valets', 'Trefle'),new Card('10', 'Trefle'),new Card('9', 'Trefle'),new Card('8', 'Trefle'),new Card('7','Trefle')
       ,new Card('As', 'Pique'), new Card('Rois', 'Pique'),new Card('Reine', 'Pique'),new Card('Valets', 'Pique'),new Card('10', 'Pique'),new Card('9', 'Pique'),new Card('8', 'Pique'),new Card('7','Pique')
       ,new Card('As', 'Carreau'), new Card('Rois', 'Carreau'),new Card('Reine', 'Carreau'),new Card('Valets', 'Carreau'),new Card('10', 'Carreau'),new Card('9', 'Carreau'),new Card('8', 'Carreau'),new Card('7','Carreau')
       ,new Card('As', 'Coeur'), new Card('Rois', 'Coeur'),new Card('Reine', 'Coeur'),new Card('Valets', 'Coeur'),new Card('10', 'Coeur'),new Card('9', 'Coeur'),new Card('8', 'Coeur'),new Card('7','Coeur')]);


          return $cardGame;


  }
    /**
     * Prendre la carte dans le pack de 32
     * @param $index
     * @return Card
     */
  // TODO manque PHPDoc
  public function getCard($index) : ?Card {
    // TODO naïf
      if($index<=32 & $index>=0){
          return  $this->cards[$index];
      }
    return null;
  }

    /**
     * compter les cartes
     */
public function __toString()
{
    return 'CardGame32 : '.count($this->cards).' carte(s)';
}
}

