<?php

namespace Yoda\EventBundle\Controller;

use DateTime;
use http\Client\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Yoda\EventBundle\Entity\Products;
use Yoda\EventBundle\EventBundle;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('EventBundle:Default:index.html.twig');
    }

    /**
     * @Route("/product_create", name="product_add")
     */
    public function createAction()
    {

        $em = $this->getDoctrine()->getManager();
        $post = new Products();

        $datetime = new DateTime('2020-06-28');

        $post->setProductName('Apple');
        $post->setProductPrice(0.5);
        $post->setProductDes('Green apple');
        $post->setProductRegTime($datetime);

        $em->persist($post);
        $em->flush();


        return $this->redirectToRoute('product_info');
    }

    /**
     * @Route("/product_show", name="product_info")
     */
    public function showAction()
    {
        $product = $this->getDoctrine()
            ->getRepository('EventBundle:Products')
            ->findAll();

        return $this->render('EventBundle:Default:product_show.html.twig', [
            'products_dataInfo' => $product]);
    }

    /**
     * @Route("/product_update", name="product_update")
     */
    public function updateAction()
    {
        $em = $this->getDoctrine()->getManager();
        $datetime = new DateTime('2020-06-27');

        $post = $em->getRepository('EventBundle:Products')->find(2);

        if (!$post) {
            throw $this->createNotFoundException("thats not a record");
        }

        /** @var $post Products */
        $post->setProductName('Bannana');
        $post->setProductPrice(0.7);
        $post->setProductDes('Yellow bannana');
        $post->setProductRegTime($datetime);

        $em->flush();

        return $this->redirectToRoute("product_info");
    }

    /**
     * @Route("/product_delete/{id}", name="product_delete")
     * @param $id
     * @return RedirectResponse
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository("EventBundle:Products")->find($id);

        if (!$post) {
            return $this->redirectToRoute("product_info");
        }

        $em->remove($post);
        $em->flush();
        
        return $this->redirectToRoute("product_info");

    }
}
