<?php

namespace Ipf\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productName')
            ->add('productCategory')
            ->add('pictures', 'collection', array(
                'type'         => new PictureType(),
                'by_reference' => true,
                'allow_add'    => true,
                'allow_delete' => true
            ))

            ->addEventListener(FormEvents::POST_SUBMIT , function(FormEvent $event) {
                $product = $event->getData();
                $form = $event->getForm();
//                var_dump($form->getData()->getPictures());
                

                
            });

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ipf\FrontBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipf_frontbundle_product';
    }
}
