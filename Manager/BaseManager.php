<?php
/**
 * Created by PhpStorm.
 * User: dhaouadi_a
 * Date: 18/05/2016
 * Time: 18:23
 */

namespace Practice\HighchartsBundle\Manager;

/**
 * Class BaseManager
 * @package Practice\managerDeshBundle\Manager
 */
abstract class BaseManager
{
    /**
     *
     *  Fusion des deux methodes  persist() &  flush()
     *  qui permet la sauvegarde des données dans la base
     *
     *
     * @param $entity
     */
    protected function persistAndFlush($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

}