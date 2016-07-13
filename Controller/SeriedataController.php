<?php

namespace Practice\HighchartsBundle\Controller;

use Practice\HighchartsBundle\Entity\SerieData;
use Practice\HighchartsBundle\Form\SeriedataType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SeriedataController
 * @package Practice\HighchartsBundle\Controller
 */
class SeriedataController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function JsonChartShowAction()
    {
//        $manager = $this->get('practice_highcharts.manager.hight_chart_manager')->getDomaineRepository();

        $repo = $this->getDoctrine()->getRepository('HighchartsBundle:SerieData');
        $datas = $repo->findJsonrepo();
        return new JsonResponse($datas);

    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function IndexAction()
    {
        $repo = $this->getDoctrine()->getRepository('HighchartsBundle:SerieData');
        $data = $repo->findAll();

        

        return $this->render('@Highcharts/seriedata/index_1.html.twig', array(
            'data' => $data
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function forJsonIndexAction()
    {

        $repo = $this->getDoctrine()->getRepository('HighchartsBundle:SerieData');
        $series = $repo->findJsonrepo();
        return $this->render('@Highcharts/seriedata/index_2.html.twig', array("series" => json_encode($series, true)));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $seriedatum = new SerieData();
        $form = $this->createForm('Practice\HighchartsBundle\Form\SeriedataType', $seriedatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seriedatum);
            $em->flush();

            return $this->redirectToRoute('hightcharts_serial_show', array('id' => $seriedatum->getId()));
        }

        return $this->render('@Highcharts/seriedata/new.html.twig', array(
            'seriedatum' => $seriedatum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Seriedata entity.
     * @param SerieData $seriedatum
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(SerieData $seriedatum)
    {
        $deleteForm = $this->createDeleteForm($seriedatum);

        return $this->render('@Highcharts/seriedata/show.html.twig', array(
            'seriedatum' => $seriedatum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param SerieData $seriedatum
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, SerieData $seriedatum)
    {
        $deleteForm = $this->createDeleteForm($seriedatum);
        $editForm = $this->createForm('Practice\HighchartsBundle\Form\SeriedataType', $seriedatum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seriedatum);
            $em->flush();

            return $this->redirectToRoute('hightcharts_serial_edit', array('id' => $seriedatum->getId()));
        }

        return $this->render('@Highcharts/seriedata/edit.html.twig', array(
            'seriedatum' => $seriedatum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param SerieData $seriedatum
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, SerieData $seriedatum)
    {
        $form = $this->createDeleteForm($seriedatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seriedatum);
            $em->flush();
        }

        return $this->redirectToRoute('hightcharts_serial_index');
    }

    /**
     * @param SerieData $seriedatum
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm(SerieData $seriedatum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hightcharts_serial_delete', array('id' => $seriedatum->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
