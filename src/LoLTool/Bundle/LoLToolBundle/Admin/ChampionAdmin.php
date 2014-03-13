<?php

namespace LoLTool\Bundle\LoLToolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ChampionAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('championId')
            ->add('name')
            ->add('active')
            ->add('attackRank')
            ->add('defenseRank')
            ->add('magicRank')
            ->add('difficultyRank')
            ->add('botEnabled')
            ->add('freeToPlay')
            ->add('botMmEnabled')
            ->add('rankedPlayEnabled')
            ->add('media')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('championId')
            ->add('name')
            ->add('active')
            ->add('attackRank')
            ->add('defenseRank')
            ->add('magicRank')
            ->add('difficultyRank')
            ->add('botEnabled')
            ->add('freeToPlay')
            ->add('botMmEnabled')
            ->add('rankedPlayEnabled')
            ->add('media')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('championId')
            ->add('name')
            ->add('active', null, array('required' => false))
            ->add('attackRank', null, array('required' => false))
            ->add('defenseRank', null, array('required' => false))
            ->add('magicRank', null, array('required' => false))
            ->add('difficultyRank', null, array('required' => false))
            ->add('botEnabled', null, array('required' => false))
            ->add('freeToPlay', null, array('required' => false))
            ->add('botMmEnabled', null, array('required' => false))
            ->add('rankedPlayEnabled', null, array('required' => false))
            ->add('media', null, array('required' => false))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('championId')
            ->add('name')
            ->add('active')
            ->add('attackRank')
            ->add('defenseRank')
            ->add('magicRank')
            ->add('difficultyRank')
            ->add('botEnabled')
            ->add('freeToPlay')
            ->add('botMmEnabled')
            ->add('rankedPlayEnabled')
            ->add('media')
        ;
    }
}
