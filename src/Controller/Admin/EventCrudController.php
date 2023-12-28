<?php

namespace App\Controller\Admin;

use App\Entity\DateEvent;
use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomEvent', 'Nom de l\'événement'),
            IntegerField::new('nbPlaces', 'Nombre de places'),
            TextEditorField::new('description', 'Description'),
            ImageField::new('imgEvent', 'Image')
                ->setBasePath('images/events')
            ->setUploadDir('public/images/events'),
        ];
    }
}
