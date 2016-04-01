<?php

/**
 * Created by PhpStorm.
 * User: HMD
 * Date: 01/04/2016
 * Time: 11:21
 */

namespace AppBundle\Form\Article;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('save', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'csrf_protection' => false,
            'data_class'     => 'AppBundle\Entity\Article\Article'
        ]);
    }
}