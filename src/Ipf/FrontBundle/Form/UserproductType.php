<?php

namespace Ipf\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

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
//            ->add('userproductProduct','hidden', array(
//                'data_class' => '\Ipf\FrontBundle\Entity\Product'
//            ))
            ->add('userproductUser')
            
        ;
        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $product = $event->getData();
            $form = $event->getForm();

            // vérifie si l'objet Product est "nouveau"
            // Si aucune donnée n'est passée au formulaire, la donnée est "null".
            // Ce doit être considéré comme un nouveau "Product"
            if (!$product || null === $product->getUserproductId()) {
                $form->add('userproductValidated','hidden');
            }
        });
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
