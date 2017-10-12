<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

/**
 * Class UserRepository
 *
 * @package AppBundle\Repository
 */
class UserRepository extends EntityRepository
{
    /**
     * Retrieve users sorted by firstname then lastname
     *
     * @return User[]
     */
    public function findAll()
    {
        return $this->findBy([], ['firstName' => 'ASC', 'lastName' => 'ASC']);
    }
}
