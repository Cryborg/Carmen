<?php
// List of the conversations for every clue
return [
    'hair' => [
        /**
         * Accepted: ms, mp, f (no need for fs/fp)
         * m: masculine + (s: singular, p: plural)
         * f: feminine
         */
        'genre[Il|Elle] avait des cheveux hair[ms].',
        'Ses longs cheveux hair[ms] étaient magnifiquement coiffés.',
        'Oui j\'ai vu genre[un homme|une femme] avec des cheveux hair[mp] qui semblait se méfier de tout le monde, mais je n\'ai pas eu l\'occasion de lui parler.',
    ],
    'height' => [
        'average' => [
            'genre[Il|Elle] était de taille plutôt moyenne.',
            'genre[Il|Elle] était de taille plutôt moyenne, à peu près comme moi.',
            'Je dirais qu\'elle devait être de taille moyenne.  Elle paraissait assez soucieuse.',
        ],
        'small' => [
            'genre[Il|Elle] levait les yeux pour parler aux gens.',
            'genre[Le|La] pauvre doit galérer pour s\'habiller en dehors du rayon enfant.',
        ],
        'tall' => [
            'genre[Il|Elle] était plutôt genre[grand|grande].',
            'Sa grande taille doit lui poser des soucis !',
            'genre[Il|Elle] était plus genre[grand|grande] que la moyenne.'
        ],
    ],
    'origin' => [
        'Son accent origin[m] était très mignon.',
        'genre[Il|Elle] avait un accent origin[m] très léger.',
        'Son accent origin[m] était très léger.',
        'Si je devais deviner à l\'accent je dirais qu\'genre[il|elle] était d\'origine origin[f].',
    ],
    'hobby' => [
        'baseball' => [
            'genre[Il|Elle] semblait genre[fasciné|fascinée] par le baseball.',
            'genre[Il|Elle] semblait genre[agacé|agacée] que je ne m\'intéresse paa au baseball.',
        ],
        'computers' => [
            'genre[Il|Elle] se vantait d\'avoir participé à de nombreux concours de hacking.',
            'genre[Il|Elle] m\'a parlé de concours de hacking mais je ne sais pas ce que c\'est.',
        ],
        'football' => [
            'genre[Il|Elle] portait un tshirt du Bayern Munich.',
            'genre[Il|Elle] commençait à me parler de foot mais je lui ai dit que je n\'y connaissais rien.',
        ],
        'matchstick' => [
            'genre[Il|Elle] m\'a montré des constructions en allumettes qu\'genre[Il|Elle] avait '
                . 'fait genre[lui|elle]-même, c\'était assez impressionnant !',
        ],
        'music' => [
            'genre[Il|Elle] portait une guitare en bandouillère.',
        ],
        'pets' => [
            'genre[Il|Elle] a passé plusieurs minutes à caresser le chien à l\'entrée.',
            'genre[Il|Elle] avait des photos de son chien dans son portefeuille.',
            'genre[Il|Elle] avait des photos de son perroquet dans son portefeuille. '
                . 'genre[Il|Elle] m\'a fait écouter un enregistrement où on l\'entend chanter du Céline Dion !',
        ],
        'postcards' => [
            'genre[Il|Elle] me disait collectionner les cartes postales.',
        ],
        'swimming' => [
            'genre[Il|Elle] me disait que ses larges épaules étaient dûes aux nombreuses heures passées à la piscine.',
            'genre[Il|Elle] était genre[déçu|déçue] du résultat du dernier championnat du monde de natation.',
        ],
        'tennis' => [
            'genre[Il|Elle] voulait savoir où genre[Il|Elle] pourrait regarder le match de tennis en buvant une bière.',
        ],
    ],
    'sign' => [
        'scar' => [
            'genre[Il|Elle] avait une cicatrice qui semblait dater de quelques années.',
            'Je crois me souvenir qu\'genre[il|elle] avait une fine cicatrice.'
        ],
        'piercing' => [
            'genre[Il|Elle] venait de changer son piercing et était genre[déçu|déçue] de la qualité.',
            'genre[Il|Elle] venait de changer son piercing et était genre[déçu|déçue] de la qualité.',
        ],
        'earring' => [
            'Ses boucles d\'oreilles auraient gagné à être plus discrète si vous voulez mon avis !',
        ],
        'tattoo' => [
            'genre[Il|Elle] arborait un magnifique tatouage sur le bras, un scorpion avec des ailes du plus bel effet.',
        ],
    ],
    'fashion_style' => [
        'casual' => [
            'genre[Il|Elle] portait un jean et un tshirt avec un lapin dessiné dessus.',
        ],
        'chic' => [
            'genre[Il|Elle] était habillée avec classe !',
            'Sa tenue était très classe, on aurait dit qu\'elle allait assister à un dîner dans la haute bourgoisie.',
        ],
        'gothic' => [
            'genre[Il|Elle] était genre[maquillé|maquillée] tout en noir et ses vêtements l\'étaient tout autant.',
            'Je me suis dit que je n\'étais décidément pas fan de son style gothique.',
        ],
        'punk' => [
            'genre[Il|Elle] arborait une crête qui était loin de laisser indifférent quand on la croisait.',
            'Les clients se retournaient sur genre[lui|elle], peu habitués à croiser quelqu\'un avec un style punk si marqué.',
        ],
        'sexy' => [
            'genre[Il|Elle] ne laissait pas indifférent, tant son sex-appeal était remarquable.',
            'genre[Les femmes|Les hommes] se retournaient sur son passage tellement genre[il|elle] était genre[habillé|habillée] sexy.',
        ],
        'sporty' => [
            'Je ne l\'ai jamais genre[vu habillé|vue habillée] autrement qu\'en jogging.',
            'Toute sa tenue était étudiée autour de ses baskets qu\'genre[il|elle] ne quittait jamais.',
        ],
        'vintage' => [
            'Je croyais qu\'genre[il|elle] allait tourner dans un film se passant dans les années 20 tant sa tenue semblait appartenir à cette époque.',
            'Son style un peu vieillot contrastait avec son langage plutôt imagé...',
        ],
    ],

    // Next destination the player has to go to
    'destination' => [
        'genre[Il|Elle] m\'a montré un livre de voyage avec ce drapeau sur la couverture : destination[flag]',
        'genre[Il|Elle] a échangé sa monnaie contre des currency[].',
        'genre[Il|Elle] m\'a donné 1 currency[] de pourboire, prétextant qu\'genre[il|elle] ne lui restait plus de notre monnaie après être genre[passé|passée] au bureau de change.',
    ],

    'which_subject' => 'Quelle information voulez-vous obtenir ?',

    // The player has chosen a wrong country
    'wrong_place' => [
        'Désolé, je n\'ai vu personne de louche aujourd\'hui',
        'Vous avez dû vous tromper, je n\'ai vu personne de louche aujourd\'hui',
        'Je pense que vous vous êtes trompé, aucune personne ne correspondant à cette description n\'est passé par ici.',
    ],

    'create' => [
        'title' => 'Créer un indice',
        'country' => 'Pays',
        'name' => 'Nom',
        'link' => 'Lien Wikipédia',
        'sentences' => 'Répliques',
        'submit' => 'Enregistrer',
    ],
];
