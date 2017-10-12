<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Word;
use Doctrine\ORM\EntityRepository;

/**
 * Class WordRepository
 *
 * @package AppBundle\Repository
 */
class WordRepository extends EntityRepository
{
    /**
     * Retrieve all words sorted by word
     *
     * @return Word[]
     */
    public function findAll()
    {
        return $this->findBy([], ['word' => 'ASC']);
    }

    /**
     * Get a random word that has not been assigned a date yet
     *
     * @return Word|null
     */
    public function findOneRandom()
    {
        $queryBuilder = $this->createQueryBuilder('word');

        $count = $queryBuilder
            ->select('COUNT(word)')
            ->where('word.date IS NULL')
            ->getQuery()
            ->getSingleScalarResult();

        if (!$count) {
            return null;
        }

        return $queryBuilder
            ->select('word')
            ->setFirstResult(rand(0, $count - 1))
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
