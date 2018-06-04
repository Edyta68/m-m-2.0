<?php

namespace MMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PurchaseInvoiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fileId')
            ->add('taxId')
            ->add('title')
            ->add('number')
            ->add('amountNetto')
            ->add('amountBrutto')
            ->add('contractors', 'entity', array(
                'class' => 'MMBundle:Contractor',
                'choice_label' => 'name',))
            ->add('file', VichFileType::class, [
                'required' => false,
            ]);
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMBundle\Entity\PurchaseInvoice'
        ));
    }
}
