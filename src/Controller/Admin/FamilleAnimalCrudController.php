<?php

namespace App\Controller\Admin;

use App\Entity\FamilleAnimal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FamilleAnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FamilleAnimal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomFamilleAnimal', 'Nom de la famille'),
            TextField::new('nomScientifique', 'Nom scientifique'),
            IntegerField::new('dangerExtinction', 'Indice extinction'),
            TextField::new('typeAlimentation', 'Alimentation'),
            TextEditorField::new('description', 'Description'),
            AssociationField::new('zoneParc')
            ->setFormTypeOption('choice_label', 'libZone')
            ->formatValue(function ($entity) {
                return isset($entity) ? $entity->getLibZone() : 'Pas de zone';
            }),
            ImageField::new('imgFamilleAnimal', 'Image')
                ->setBasePath('images/famille_animal')
                ->setUploadDir('public/images/famille_animal'),
            AssociationField::new('espece', 'Espèce')
                ->setFormTypeOption('choice_label', 'libEspece')
                ->formatValue(function ($entity) {
                    return isset($entity) ? $entity->getLibEspece() : 'Pas de d\'espèce';
                }),
            AssociationField::new('assoHabitatFamilleAnimals', 'Habitat')
                ->setFormTypeOption('choice_label', 'habitat.libHabitat')
                ->setFormTypeOption('by_reference', false),
        ];
    }
}
