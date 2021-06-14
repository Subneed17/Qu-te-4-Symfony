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
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::Actor as $key => $ActorName) {
            $actor = new Actor();
            $actor->setName($ActorName);
            $manager->persist($actor);
            $this->addReference('actor_' . $key, $actor);
        }
        $manager->flush();
    }
}
