<?php
/**
 * Created by PhpStorm.
 * User: dhaouadi_a
 * Date: 18/05/2016
 * Time: 18:22
 */

namespace Practice\HighchartsBundle\Manager;

use Doctrine\ORM\EntityManager;
use Practice\HighchartsBundle\Entity\SerieData;

/**
 * Class DomaineDeshManager
 * @package Practice\managerDeshBundle\Manager
 */
class hightChartManager extends BaseManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * ServiceDeshManager constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * persistAndFlush() Domaine entity data
     *
     * @param SerieData $data
     */
    public function saveDomaines(SerieData $data)
    {
        $this->persistAndFlush($data);
    }


    /**
     * Raccourci SerieData repository
     * @return \Practice\HighchartsBundle\Repository\SerieDataRepository
     */
    public function getDomaineRepository()
    {
        return $this->em->getRepository('HighchartsBundle:SerieData');
    }

}