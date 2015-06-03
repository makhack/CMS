<?php

namespace Ipf\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserproductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userproductPrice')
            ->add('userproductSold')
            ->add('userproductSaledate')
            ->add('userproductSolddate')
            ->add('userproductDescription')
            ->add('userproductProduct')
            ->add('userproductUser')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ipf\FrontBundle\Entity\Userproduct'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipf_frontbundle_userproduct';
    }
}
