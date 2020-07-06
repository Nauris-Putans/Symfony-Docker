<?php

namespace Yoda\EventBundle\Admin;

use Yoda\EventBundle\Entity\BlogPost;
use Yoda\EventBundle\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
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

    protected function configureListFields(ListMapper $listMapper)
    {
        // ... configure $listMapper
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

}