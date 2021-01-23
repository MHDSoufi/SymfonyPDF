<?php

namespace App\Form;

use App\Entity\Locataire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Bien;
use App\Repository\BienRepository;

class LocataireType extends AbstractType
{
  private $bienRepository;
  public function __construct(BienRepository $bienRepository){
    $this->bienRepository = $bienRepository;
  }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('bien', EntityType::class, [
                'class' => Bien::class,
                'choices' => $this->bienRepository->findBy([
                    "locataireId" => null,
                ]),
                'choice_label' => function ($biens) {
                    return $biens->getType() .' ' . 'au ' . $biens->getEtage(). ' etage ' . $biens->getAdresse();
                }
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Locataire::class,
        ]);
    }
}
