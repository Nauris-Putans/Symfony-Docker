<?php

namespace Yoda\EventBundle\Admin;


use http\Client\Request;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Yoda\EventBundle\Entity\Image;
use Aws\S3\S3Client;


final class ImageAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('file', FileType::class, [
                'required' => false,
            ])
        ;

    }

    protected function configureListFields(ListMapper $listMapper) // builds list field
    {
        $listMapper
            ->addIdentifier('id')
            ->add('filename')
            ->add('updated')
            ->add('path')
            ->add('mime_type')
            ->add('size')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) // builds filter/search option
    {
        $datagridMapper
            ->add('id') // search by 'id'
            ->add('filename')
            ->add('updated')
            ->add('path')
            ->add('mime_type')
            ->add('size')
        ;
    }

    public function toString($file)
    {
        return $file instanceof Image
            ? $file->getFilename()
            : 'Image'; // shown in the breadcrumb on the create view
    }




    public function prePersist($file)
    {
        $this->manageFileUpload($file);
    }

    public function preUpdate($file)
    {
        $this->manageFileUpload($file);
    }

    private function manageFileUpload($file)
    {
        if ($file->getFile())
        {
            $basepath = $this->getRequest()->getBasePath();
            $file->refreshUpdated();
            $file->lifecycleFileUpload($basepath);
        }
    }

    // ...

}
