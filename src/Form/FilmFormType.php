<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Film;
use App\Form\HoraireType;
use App\Entity\Salle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class FilmFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $cinema = $options['cinema']; // Récupérer le cinéma passé en option

        $builder->add('titre');
        $builder->add('horaires', CollectionType::class, [
            'entry_type' => HoraireType::class,
            'allow_add' => true,
            'label' => 'Ici doit etre le champs pour les heures',
            'by_reference' => false,
        ])
        ->add('salles', EntityType::class, [
            'class' => Salle::class, 
            'choices' => $cinema->getSalles(), // Utiliser les salles associées au cinéma actuel 
            'choice_label' => 'Numerosalle', // ou un autre attribut que vous souhaitez afficher
            'multiple' => true, // Permettre la sélection de plusieurs salles
            'expanded' => true, // Afficher les salles sous forme de cases à cocher ou de sélecteur déroulant
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'cinema' => null, // Définir une option par défaut pour le cinéma 
        ]);
    }
}
