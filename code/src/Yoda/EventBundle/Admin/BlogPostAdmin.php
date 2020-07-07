<?php

namespace Yoda\EventBundle\Admin;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Yoda\EventBundle\Entity\BlogPost;
use Yoda\EventBundle\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Controller\CRUDController;

final class BlogPostAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper) //builds form
    {
        $formMapper // creates form
            ->tab('Post') // creates tab 'Post'
                ->with('Content', array('class' => 'col-md-9'))
                    ->add('title', 'text')
                    ->add('body', 'textarea')
                ->end()
            ->end()

            ->tab('Publish Options') // creates tab 'Publish Options'
                ->with('Meta data', array('class' => 'col-md-3'))
                    ->add('category', 'sonata_type_model', array(
                        'class' => 'Yoda\EventBundle\Entity\Category',
                        'property' => 'name',
                    ))
                ->end()
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper) // builds list field
    {
        $listMapper
            ->addIdentifier('title') // shows title
            ->add('category.name') // shows category name
            ->add('draft') // shows draft status
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) // builds filter/search option
    {
        $datagridMapper
            ->add('title') // search by 'title'
            ->add('category', null, [], EntityType::class, [ // search by 'category'
                'class' => Category::class,
                'choice_label' => 'name',
            ])
            ;

    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

}