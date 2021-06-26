<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    const Actor = [
        'Andrew Lincoln',
        'Norman Reedus',
        'Lauren Cohan',
        'Danai Gurira',
        'Jeffrey Dean Morgan',
        'Chandler Riggs',
        'emilia clark',
        'kit harington',
        'sophie turner',
        'Travis Fimmel',
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::Actor as $key => $val) {
            $actor = new Actor();
            $actor->setName($val);
            $manager->persist($actor);
            $this->addReference('actor_' . $key, $actor);
        }
        $manager->flush();
    }
}
