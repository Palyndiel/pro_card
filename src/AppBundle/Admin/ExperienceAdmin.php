<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ExperienceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title_fr', 'text');
        $formMapper->add('title_eng', 'text');
        $formMapper->add('length', 'text');
        $formMapper->add('company', 'text');
        $formMapper->add('description_fr', 'text', array('required' => false));
        $formMapper->add('description_eng', 'text', array('required' => false));
        $formMapper->add('isEdu', 'checkbox', array('required' => false));
        $formMapper->add('ordre', 'integer');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title_fr');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title_fr');
    }
}