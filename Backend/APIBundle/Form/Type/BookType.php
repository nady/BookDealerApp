<?php

namespace Backend\APIBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('price')
            ->add('createdAt', 'datetime')
            ->add('updatedAt', 'datetime')
            ->add('dealers')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\APIBundle\Entity\Book'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "";
    }
}
