# Projet1
<h1>Projet Guess</h1>
 Guess What


Thème


Développer une logique de jeu en PHP en mettant en oeuvre de la conception objet et des tests unitaires.


Jeu en mode console. Un début d’implémentation est proposé (play-console.php à lancer dans une console)
 Les étapes d’un scénario typique d’usage sont




(optionnel pour le joueur) paramétrage du jeu (par exemple choix du jeu de cartes, activation de l’aide à la recherche, …​)


Lancement d’une partie (le jeu instancie un jeu de carte et tire une carte "au hasard"), que le joueur doit deviner en un temps optimal


Le joueur propose une carte


Si ce n’est pas la bonne carte, alors si l’aide est activée, le joeur est informé si la carte qu’il a soumise est plus petite ou plus grande que celle à deviner. Retour en 3.


(c’est la bonne carte alors) La partie se termine et le jeu affiche des éléments d’analyse (nombre de fois où le joueur a soumis une carte, sa qualité stratégique, …​)


Fin de la partie.
<h1>Challenge 1</h1>

Dans le challenge 1 ma mission était de vérifier les différentes versions de Php et composer grace aux commandes php -version et composer -V ensuite j'ai cloné le projet, j'ai ensuite télécharger et installer le fichier composer Json avec composer install  et finit par installer le plugin Phpunit avec php --version.

Je n'ai pas rencontré de problème durant ce challenge car rien de bien compliquer était demander  :smile:

<h1>Challenge 2</h1>

Pour le challenge 2 notre défi était de supprimer les 4 erreurs qui était dans le dossier CardTest pour cela j'ai du modifier les todo de la page CardTest il en avait 4 todo à modifier et une constate à rajouter dans le document Card Game32 :
 public function testCompareSameNameNoSameColor()
  {

    $card1 = new Card('As', 'Coeur');
    $card2 = new Card('As', 'Pique');
    $this->assertEquals(+1, CardGame32::compare($card1,$card2));
  }


voici 1 des  todos que j'ai modifier , cette fonction permet de comparer deux meme carte avec deux couleur differentes ici nous avons deux "As" mais la couleur et bien differente car le premier est un As de Coeur et le second et un As de Pique.

Pour etablire un ordre de puissance dans mon programme Cardtest j'ai rajouter une constante dans CardGame32:

 Const ORDERS_COLORS = ['coeur' =>4, 'carreau' =>3, 'pique'=>2,'trefle'=>1];
 Const ORDERS_CARDS = ['as' =>8 ,'rois' =>7, 'dames' =>6, 'valets' =>5, '10' =>4, '9' =>3, '8' =>2, '7' =>1];
 
 Dans ma dernier ligne de code nous pouvons voir un +1 ce +1 montre que la carte du haut et plus grande (plus forte) que celle du bas 
 pour que mon programme comprenne cela j'ai cree une conditions:
  


    if ($c1Name === $c2Name) {
      if ($c1Color === $c2Color){
         return 0;
      }
       return (self::ORDERS_COLORS[$c1Color]>self::ORDERS_COLORS[$c2Color]) ? +1 :-1;
    } 
     return (self::ORDERS_CARDS[$c1Name]>self::ORDERS_CARDS[$c2Name]) ? +1 :-1;
    }
    
Cette conditions dit tout simplement que si card1  et card2 sont egaux le resultat sera 0
si la card1 et plus grand que la card2 le resultat sera +1 
et si la card1 et plus petite que la card2 le resulta sera -1.


<h1>Challenge 3</h2>

Pour le challenge 3 nous devions crée un nouveau fichier dans le dossier Test qu'on na nommée "GameCard32Test" dans ce document nous allons tester un jeux de 32 carte, pour cela j'ai cree un jeu de 32 carte dans GameCard32.

 public static function factoryCardGame32() : CardGame32 {

      $cardGame = new CardGame32([new Card('As', 'Trefle'), new Card('Rois', 'Trefle'),new Card('Reine', 'Trefle'),new Card('Valets', 'Trefle'),new Card('10', 'Trefle'),new Card('9', 'Trefle'),new Card('8', 'Trefle'),new Card('7','Trefle')
       ,new Card('As', 'Pique'), new Card('Rois', 'Pique'),new Card('Reine', 'Pique'),new Card('Valets', 'Pique'),new Card('10', 'Pique'),new Card('9', 'Pique'),new Card('8', 'Pique'),new Card('7','Pique')
       ,new Card('As', 'Carreau'), new Card('Rois', 'Carreau'),new Card('Reine', 'Carreau'),new Card('Valets', 'Carreau'),new Card('10', 'Carreau'),new Card('9', 'Carreau'),new Card('8', 'Carreau'),new Card('7','Carreau')
       ,new Card('As', 'Coeur'), new Card('Rois', 'Coeur'),new Card('Reine', 'Coeur'),new Card('Valets', 'Coeur'),new Card('10', 'Coeur'),new Card('9', 'Coeur'),new Card('8', 'Coeur'),new Card('7','Coeur')]);
     
   j'ai crée une function qui permet de verifier le nombre de carte dans le packet par exemple pour 2 cartes (j'ai effectuer la meme methode pour une carte ) :
   
   
     $jeudecarte = new CardGame32([new Card('As', 'Pique'), new Card('Rois', 'Coeur')]);
    $this->assertEquals('CardGame32 : 2 carte(s)',$jeudecarte->__toString());
    
   
Ainsi que pour 32:

    $cards= CardGame32::factoryCardGame32();
        $this->assertEquals('CardGame32 : 32 carte(s)',$cards->__toString());
        
 Ensuite j'ai cree une fonction qui va me permetre de prendre la carte a position situer dans le getCard par exemple :
 
    $card = new CardGame32 ([new Card('Dame' , 'Coeur')]);
    $this->assertEquals(new Card('Dame', 'Coeur') , $card ->getCard('0'));
Ici mon programme va prendre la carte 0.

 Ensuite j'ai fait la fonction shuffle cette fonction va me permettre de melanger mon packet de 32 cartes , j'ai dabord modifier le todo qui concerne le shuffle dans CardGame32 
           
           return shuffle($this->cards);
Ensuite j'ai cree la function shuffle dans min CardGameTest32
 
       $cardGameMelange = CardGame32::factoryCardGame32();
       $cardGameMelange->shuffle();
       $cardGame = CardGame32::factoryCardGame32();
       $this->assertNotEquals($cardGameMelange, $cardGame);
 Alors , ici nous avons deux packet de carte un packtet ou les 32 carte son melanger et un deuxieme ou le packat de carte n'est pas melanger.
 
 Probleme rencontrer durant challenge:
 
J'ai prit du temp a comprendre ce qu'il fallait faire concraitement j'ai eu l'aide de mes camarade pour comprendre ce qu'il fallait faire ou pour comprendre certaine notion comment le shuffle.

<h1> Challenge 4</h1>
Je n'est malheuresement pas eu le temp de le faire mes j'ai fait le todo situer dans guess qui me demander de cree une condition TODO si $cardGame est null, affecter alors un jeu de 32 par défaut :

       if($cardGame == null )
  <h1>Conclusion</h1>
  Pour conclure ce projet ma permis d'apprendre a maitrissez php unit ainsi que les test unitaire , si je dois siter des diffuclters personelle :
  -temp a comprendre ce qui est demander 
  -je n'est pas su gerer mon temp voila pourquoi je n'est pas pue finir le challenge 4. 
  
 
