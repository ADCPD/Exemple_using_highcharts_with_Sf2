<?php
/**
 * Created by PhpStorm.
 * User: dhaouadi_a
 * Date: 19/05/2016
 * Time: 11:49
 */

namespace Practice\HighchartsBundle\Command;

use Practice\HighchartsBundle\Entity\SerieData;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class highchartsDataCommand
 * @package Practice\HighchartsBundle\Command
 */
class highchartsDataCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('highcharts:load:list')
            ->setDescription('Highcharts auto load test data ... ');
    }

    /**
     * {@inheritdoc}
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** Manager */
        $em = $this->getContainer()->get("doctrine")->getManager();

        /**  Services repository  */
        $_repo = $em->getRepository('HighchartsBundle:SerieData')->findAll();

        /** Surcharge fixed data 1 */

        $list_one = array(
            null, null, null, null, null, 6, 11, 32, 110, 235, 369, 640,
            1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
            27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662,
            26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
            24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586,
            22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
            10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104
        );

        $list_two = array(
            null, null, null, null, null, null, null, null, null, null,
            5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
            4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
            15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
            33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
            35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
            21000, 20000, 19000, 18000, 18000, 17000, 16000
        );
        $key = 0;



            foreach ($list_one as $value) {
                $instance[$key] = new SerieData();
                $instance[$key]->setName('USA');
                $instance[$key]->setData($list_one[$key] = $value);
                $em->persist($instance[$key]);
                $em->flush();

            }

        foreach ($list_two as $value) {
            $instance[$key] = new SerieData();
            $instance[$key]->setName('USSR/Russia');
            $instance[$key]->setData($list_one[$key] = $value);
            $em->persist($instance[$key]);
            $em->flush();
        }

    }


}