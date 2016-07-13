<?php

namespace Practice\HighchartsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SerieData
 *
 * @ORM\Table(name="highcharts_serieData")
 * @ORM\Entity(repositoryClass="Practice\HighchartsBundle\Repository\SerieDataRepository")
 */
class SerieData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="data", type="float",nullable=true)
     */
    private $data;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SerieData
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set data
     *
     * @param float $data
     *
     * @return SerieData
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return float
     */
    public function getData()
    {
        return $this->data;
    }
}

