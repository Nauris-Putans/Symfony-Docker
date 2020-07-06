<?php

namespace Yoda\EventBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Tests\Fixtures\EntityInterface;
use Yoda\EventBundle\Entity\ItemsAdd;

use Symfony\Component\HttpFoundation\Request;
use Yoda\EventBundle\Form\ProductsType;

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
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\EventBundle\Entity\ItemsAdd',
            'allow_extra_fields' => true,
            'csrf_protection' => false,
        ));
    }

    /**
     *
     * @Route("/product_create", name="product_add")
     */
    public function createAction(Request $request)
    {
        $product = new ItemsAdd();
        $form = $this->createForm(ProductsType::class) ; //asking symfony to build a form

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();

//            $name = $form['product_name']->getData();
//            $price = $form['product_price']->getData();
//            $description = $form['product_des']->getData();
//            $regTime = $form['product_regTime']->getData();
//
//            $product->setProductName($request->request->get($name)['product_name']);
//            $product->setProductPrice($request->request->get($price)['product_price']);
//            $product->setProductName($request->request->get($description)['product_des']);;
//            $product->setProductName($request->request->get($regTime)['product_regTime']);

             $em = $this->getDoctrine()->getManager();
             $em->persist($product);
             $em->flush();

            return $this->redirectToRoute('product_info');
        }

        return $this->render('EventBundle:Default:product_create.html.twig', array( //data that goes to product create form
            'form' => $form->createView(),  //passing data in instance "form"
        ));

    }

    /**
     * @Route("/product_show", name="product_info")
     */
    public function showAction()
    {
        $product = $this->getDoctrine()
            ->getRepository('EventBundle:ItemsAdd')
            ->findAll();

        return $this->render('EventBundle:Default:product_show.html.twig', [
            'products_dataInfo' => $product]);
    }
}

