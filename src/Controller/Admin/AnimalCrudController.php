<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom', 'Nom'),
            NumberField::new('taille', 'Taille'),
            NumberField::new('poids', 'Poids'),
            DateField::new('dateNaissance', 'Date de naissance'),
            DateField::new('dateMort', 'Date de la mort'),
            TextEditorField::new('caracteristique'),
            AssociationField::new('famille', 'Famille d\'animaux')
            ->setFormTypeOption('choice_label', 'nomFamilleAnimal')
            ->formatValue(function ($entity) {
                return isset($entity) ? $entity->getNomFamilleAnimal() : 'Pas de famille';
            }),
            ImageField::new('imgAnimal')
                ->setBasePath('images/animaux')
                ->setUploadDir('public/images/animaux'),
        ];
    }
}
