<?php

namespace App\Controller\Admin;


use App\Entity\Visit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\MakerBundle\Doctrine\EntityDetails;


class VisitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Visit::class;
    }
    public function configureCrud (Crud $crud): Crud
    {
                return $crud
                ->setEntityLabelInPlural('Wizyty')
                ->setEntityLabelInSingular('Wizyty')
                ->setPageTitle("index","Tytuł strony")
                ->setPaginatorPageSize(10);
              //  ->overrideTemplate('layout', 'templates/bundles/EasyAdminBundle/page/visit.html.twig');
    }
  /*  public function configureActions (Actions $actions): Actions
    {
            return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }*/
    #[IsGranted('ROLE_ADMIN')]
    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
          //  TextField::new('title'),
          //  TextEditorField::new('description'),
      //  yield  DateTimeField::new('startDate','Początek wyzyty')->renderAsChoice(),
      yield  DateTimeField::new('startDate','Początek wyzyty')->renderAsNativeWidget(),
        yield DateTimeField::new('endDate','Koniec wizyty')->renderAsNativeWidget(),
       yield AssociationField::new('doctor')
       ->renderAsNativeWidget(),
      // ->hideOnDetail(),
        yield AssociationField::new('patient','Pacjęt')
        //->autocomplete()
        ->renderAsNativeWidget(),
       //->setTemplatePath('admin/field/patient.html.twig'),
      //  ->hideOnIndex(),
        ];
    }
public function configureActions(Actions $actions):Actions
    {
      return parent::configureActions($actions)
      ->setPermission(Action::INDEX, 'ROLE_SUPER_ADMIN');
    }
    
}
