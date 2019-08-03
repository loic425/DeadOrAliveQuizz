<?php
/*
 * This file is part of DeadOrAliveQuizz.
 *
 * (c) Mobizel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Celebrity;
use App\Entity\Round;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use function Doctrine\ORM\QueryBuilder;

class CelebrityRepository extends EntityRepository
{
    public function findRandomOneForRound(Round $round): Celebrity
    {
        $queryBuilder = $this->createQueryBuilder('o');
        $queryBuilder
            ->join('o.themes', 'theme')
            ->where($queryBuilder->expr()->eq('theme', ':theme'))
            ->setParameter('theme', $round->getTheme())
            ->setMaxResults(1);

        return $queryBuilder->getQuery()->getSingleResult();
    }
}
