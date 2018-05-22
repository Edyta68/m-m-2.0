<?php

namespace MMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nrInwentarzowy')
            ->add('nazwa')
            ->add('nrSeryjny')
            ->add('dataZakupu', 'date')
            ->add('nrFaktury')
            ->add('terminGwarancji', 'date')
            ->add('wartoscNetto')
            ->add('kogoSprzet')
            ->add('notatki')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMBundle\Entity\Equipment'
        ));
    }
}
