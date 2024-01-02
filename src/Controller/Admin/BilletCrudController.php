<?php

namespace App\Controller\Admin;

use App\Entity\Billet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class BilletCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Billet::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('nbJours', 'Nombre de Jours'),
            NumberField::new('tarifAdult', 'Tarif Adulte'),
            NumberField::new('tarifChild', 'Tarif Enfant'),
        ];
    }
}
