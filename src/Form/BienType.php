<?php

namespace App\Form;

use App\Entity\Bien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('etage')
            ->add('adresse')
            ->add('loyerHC')
            ->add('charge')
            ->add('suplements', CollectionType::class,[
              'entry_type' => SuplementType::class,
              'entry_options' => ['label' => false],
              'allow_add' => true,
            ])
            ->add('paiementCaf')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
