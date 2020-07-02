<?php

namespace Yoda\EventBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Tests\Fixtures\EntityInterface;
use Yoda\EventBundle\Entity\Products;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Yoda\EventBundle\EventBundle;
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
            'data_class' => 'Yoda\EventBundle\Entity\Products',
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
            ->getRepository('EventBundle:Products')
            ->findAll();

        return $this->render('EventBundle:Default:product_show.html.twig', [
            'products_dataInfo' => $product]);
    }
}

