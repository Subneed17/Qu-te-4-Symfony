<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{

    public const PROGRAMS = [
        [
            'title' => 'Game Of Thrones',
            'summary' => 'Dans le continent mythique de Westeros, plusieurs familles puissantes se battent pour le 
          contrôle des sept royaumes. Alors que le conflit éclate dans les royaumes des hommes, un ancien ennemi se lève
           une fois de plus pour les menacer tous. Pendant ce temps, les derniers héritiers d\'une dynastie récemment 
           usurpée complotent pour reprendre leur terre natale de l\'autre côté de la mer Narrow Sea.',
            'poster' => 'https://static2.srcdn.com/wordpress/wp-content/uploads/2020/12/Game-of-Thrones-Season-8-Finale-Cast-Iron-Throne.jpg?q=50&fit=crop&w=960&h=500&dpr=1.5',
            'category' => 1,
            'country' => 'Etats-uni, Royaume-uni',
            'year' => 2011,
        ],
        [
            'title' => 'One Piece',
            'summary' => 'Il était une fois un pirate nommé Gol D. Roger. Il a obtenu richesse, gloire et pouvoir pour 
            gagner le titre de Roi des Pirates. Lorsqu\'il fut capturé et sur le point d\'être exécuté, il révéla que 
            son trésor appelé One Piece était caché quelque part à Grand Line. Tout le monde s\'est alors mis à la 
            recherche du trésor d\'une seule pièce, mais personne n\'a jamais trouvé l\'emplacement du trésor de Gol D. 
            Roger, et Grand Line était un endroit trop dangereux pour être franchi. Vingt-deux ans après la mort de Gol 
            D. Roger, un garçon nommé Monkey D. Luffy a décidé de devenir un pirate et de chercher le trésor de Gol D. 
            Roger pour devenir le prochain roi pirate.',
            'poster' => 'https://i0.wp.com/anitrendz.net/news/wp-content/uploads/2020/04/One-Piece.jpg?resize=696%2C392&ssl=1',
            'category' => 2,
            'country' => 'Japan',
            'year' => 1999,
        ],
        [
            'title' => 'The Walking Dead',
            'summary' => 'Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le 
            monde, ravagé par une épidémie, est envahi par les morts-vivants.',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BZmFlMTA0MmUtNWVmOC00ZmE1LWFmMDYtZTJhYjJhNGVjYTU5XkEyXkFqcGdeQXVyMTAzMDM4MjM0._V1_.jpg',
            'category' => 4,
            'country' => 'Etats-uni',
            'year' => 2010,
        ],

        [
            'title' => 'Vikings',
            'summary' => 'Le valeureux Ragnar Lothbrok est un fermier doublé d?un guerrier féroce. Marié, père d?un garçon et d?une fille, il est lassé de piller chaque année les terres situées à l\'Est, pauvres et déjà dévastées. Il a un rêve : partir à l?Ouest pour y découvrir de nouvelles cités à piller. En secret, il fait construire un drakkar de conception révolutionnaire. Mais il doit d?abord convaincre le seigneur local, Earl Haraldson, de se lancer dans cette aventure...',
            'poster' => 'https://media.senscritique.com/media/000004480578/80/Vikings.jpg", 1)',
            'category' => 2,
            'country' => 'Canana-Irlande',
            'year' => 2013
        ],
        [
            'title' => 'La casa de Papel',
            'summary' => 'Dans la série La Casa de Papel, le but de l\'équipe que l\'on suit est de voler la Fabrique nationale de la monnaie et du timbre à Madrid mais sans voler l\'argent du contribuable, et surtout : sans tuer. Pour préparer la mission, le Professeur (Álvaro Morte), cerveau de l\'opération, a réuni des personnages de différents horizons dans la campagne espagnole.',
            'poster' => 'https://wallpapercave.com/wp/wp3896459.jpg", 1)',
            'category' => 1,
            'country' => 'Espagne',
            'year' => 2017
        ],
        [
            'title' => 'Ragnarok',
            'summary' => 'Au coeur de la campagne norvégienne, dans le lycée de la petite ville fictive d\'Edda, des adolescents assistent impuissants et choqués à de violents changements climatiques et se persuadent que ces catastrophes naturelles sont annonciatrices du Jour du jugement dernier.',
            'poster' => 'https://img.minutoneuquen.com/u/fotografias/fotosnoticias/2020/1/11/192459.jpg", 1)',
            'category' => 1,
            'country' => 'Norvège',
            'year' => 2020
        ],
        [
            'title' => 'Fear The Walking Dead',
            'summary' => 'La série se déroule au tout début de l\'épidémie relatée dans la série-mère The Walking Dead 
            et se passe dans la ville de Los Angeles, et non à Atlanta. 
             Madison est conseillère dans un lycée de Los Angeles. Depuis la mort de son mari, elle élève seule ses deux
              enfants : Alicia, excellente élève qui découvre les premiers émois amoureux, et son grand frère Nick qui a
               quitté la fac et a sombré dans la drogue.',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BYWNmY2Y1NTgtYTExMS00NGUxLWIxYWQtMjU4MjNkZjZlZjQ3XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SY1000_CR0,0,666,1000_AL_.jpg", 1)',
            'category' => 4,
            'country' => 'Etats-uni',
            'year' => 2015
        ],
        [
            'title' => 'The 100',
            'summary' => 'Créée par Jason Rothenberg d\'après le roman éponyme de Kass Morgan, The 100 est une série dramatique de science-fiction américaine de la chaîne The CW diffusée à partir du 19 mars 2014.SynopsisAprès une apocalypse causée par l\'Homme lors d\'une troisième guerre mondiale, les 318 survivants recensés se réfugient dans des stations spatiales et parviennent à y vivre et à s\'y reproduire, atteignant le nombre de 4000. Mais 97 ans plus tard, le vaisseau mère, The Ark, est en piteux état. Une centaine de jeunes délinquants emprisonnés au fil des années pour des crimes ou des trahisons sont choisis comme cobayes par les autorités pour redescendre sur Terre et tester les chances de survie. Dès leur arrivée, ils découvrent un nouveau monde, dangereux mais fascinant.ProductionLe série est composée pour l\'heure d\'une saison de 13 épisodes de 42 minutes.',
            'poster' => 'https://1.bp.blogspot.com/-b5WPhJWdLwc/WejlCQBdzJI/AAAAAAAAAyk/K_SMK5OR9XoJOXZEwEFUZNHTFWp4oilvwCLcBGAs/s1600/The%2B100%2Bseason%2B2.jpg", 1)',
            'category' => 1,
            'country' => 'Etats-Unis',
            'year' => 2015
        ]
    ];

    private $slug;

    public function __construct(Slugify $slug)
    {
        $this->slug = $slug;
    }
    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $key => $val) {
            $program = new Program();
            $program->setTitle($val['title']);
            $program->setSummary($val['summary']);
            $program->setPoster($val['poster']);
            $program->setCountry($val['country']);
            $program->setYear($val['year']);
            $program->setCategory($this->getReference('category_' . $val['category']));
            $program->setSlug($this->slug->generate($val['title']));
            $manager->persist($program);
            $this->addReference('program_' . $key, $program);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ActorFixtures::class,
            CategoryFixtures::class
        ];
    }
}