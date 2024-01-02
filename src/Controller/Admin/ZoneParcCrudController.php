<?php

namespace App\Controller\Admin;

use App\Entity\ZoneParc;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ZoneParcCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ZoneParc::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libZone', 'Nom de la zone'),
            ImageField::new('imgZone', 'Image')
                ->setBasePath('images/zone_parc')
                ->setUploadDir('public/images/zone_parc'),
        ];
    }
}
