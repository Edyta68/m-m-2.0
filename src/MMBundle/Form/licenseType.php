<?php

namespace MMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class licenseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numerinwentarzowy')
            ->add('nazwa')
            ->add('kluczseryjny')
            ->add('datazakupu', 'date')
            ->add('idfaktury')
            ->add('wsparcietechnicznedo', 'date')
            ->add('licencjado')
            ->add('stan')
            ->add('notatka')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMBundle\Entity\license'
        ));
    }
}
