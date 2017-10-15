<?php

namespace Tests\DataFixtures;

use AppBundle\Entity\Word;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class SpecificDateFixture
 *
 * @package DataFixtures
 */
class SpecificDateFixture implements FixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $word = new Word();
        $word
            ->setWord('Conviction')
            ->setPronunciation('con-vic-shun')
            ->setDate(new \DateTime('2017-10-15'));

        $manager->persist($word);
        $manager->flush();
    }
}
