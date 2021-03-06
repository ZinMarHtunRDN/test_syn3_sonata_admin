<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class BlogPostAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array('class' => 'col-md-9'))
                ->add('title', 'text')
                ->add('body', 'textarea')
            ->end()
            ->with('Category', array('class' => 'col-md-9'))
                ->add('category', 'entity', array(
                    'class' => 'AppBundle\Entity\Category',
                    'choice_label' => 'name',
                ))
            ->end()
            ->with('Metadata', array('class' => 'col-md-9'))
                ->add('draft')
                ->add('createdAt', 'datetime')
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        // ... configure $listMapper

        $listMapper
	        ->addIdentifier('id')
	        ->add('title')
	        ->add('body')
	        ->add('created_at', 'datetime', array(
				    'pattern' => 'yyyy-MM-dd HH:mm:ss',
				    'locale' => 'en',
				));
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        	->add('id')
        	->add('title')
        	->add('body');
    }
}