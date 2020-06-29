<?php

namespace Yoda\EventBundle\Controller;

use DateTime;
use http\Client\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
     * @return Response
     */
    public function createAction()
    {
        $product = new Products();
        $datetime = new DateTime('2011-01-01');

        $product->setProductName('Keyboard');
        $product->setProductPrice(19.99);
        $product->setProductDes('Ergonomic and stylish!');
        $product->setProductRegTime($datetime);

        $entityManager = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }

    /**
     * @Route("/product_show", name="product_info")
     */
    public function showAction()
    {
        $product = $this->getDoctrine()
            ->getRepository('EventBundle:Products')
            ->findAll();

        return $this->render('EventBundle:Default:index.html.twig', array (
            'products_dataInfo' => $product));
    }
}
