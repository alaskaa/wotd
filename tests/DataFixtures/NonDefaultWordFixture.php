<?php

namespace Tests\DataFixtures;

use AppBundle\Entity\Word;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 * Class NonDefaultWordFixture
 *
 * @package Tests\AppBundle\DataFixtures
 */
class NonDefaultWordFixture implements FixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $word = new Word();
        $word
            ->setWord('Example')
            ->setPronunciation('ex-amp-l');

        $manager->persist($word);
        $manager->flush();
    }
}