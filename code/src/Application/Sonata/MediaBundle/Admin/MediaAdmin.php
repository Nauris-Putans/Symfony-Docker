<?php

namespace Application\Sonata\MediaBundle;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

final class MediaAdmin extends AbstractAdmin
{
protected function configureFormFields(FormMapper $formMapper)
{
// ... configure $formMapper
}

protected function configureListFields(ListMapper $listMapper)
{
// ... configure $listMapper
}
}