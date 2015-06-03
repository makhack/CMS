<?php
namespace Ipf\FrontBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productName')
                ->add('productDescription')
                ->add('productCategory');
        
        return $builder;
        
    }

    public function getName()
    {
        return 'product';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ipf\FrontBundle\Entity\Product',
        ));
    }
}