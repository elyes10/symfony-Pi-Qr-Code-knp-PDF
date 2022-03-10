<?php

namespace App\Form;

use App\Entity\Centrecamping;
use App\Entity\Region;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class CentrecampingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomc')
            ->add('descriptionc')
            ->add('prix')
            ->add('typec')
            ->add('idr',EntityType::class,[
                'class' => Region::class,
                'choice_label'=>'nomr',


            ])
            ->add('imgcentre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Centrecamping::class,
        ]);
    }
}
