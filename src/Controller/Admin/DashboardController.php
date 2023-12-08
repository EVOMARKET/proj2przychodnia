<?php

namespace App\Controller\Admin;

use App\Entity\Doctor;

use App\Entity\Patient;
use App\Entity\Specjalization;
use App\Entity\Visit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       // return parent::index();
        $adminUrlGenerator =$this->container->get(AdminUrlGenerator::class);
        $url = $adminUrlGenerator->setController(DoctorCrudController::class)->generateUrl();
        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());
       // return $this->redirect($adminUrlGenerator->setController(DoctorCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Strona konfiguracyjna');
    }

    public function configureMenuItems(): iterable
    {
         yield MenuItem::linkToCrud('Doctor', 'fas fa-list', Doctor::class)
         ->setPermission('ROLE_ADMIN');
        // ->setPermission('ROLE_MODERATOR');

      //  yield MenuItem::linkToCrud('Doctor', 'file-type-reactts', Doctor::class);
         yield MenuItem::linkToCrud('Specjalization', 'fas fa-list',Specjalization::class)
         ->setPermission('ROLE_ADMIN');
       //  ->setPermission('ROLE_MODERATOR');
         yield MenuItem::linkToCrud('Pacjenci', 'fas fa-list', Patient::class)
         ->setPermission('ROLE_ADMIN');
       //  ->setPermission('ROLE_MODERATOR');
         yield MenuItem::linkToCrud('Wizyty', 'fas fa-list', Visit::class);
      //   ->setPermission('ROLE_SUPER_ADMIN');
       // ->setPermission('ROLE_MODERATOR');
         
    }

 /*   public function configureCrud():Crud
    {
        return parent::configureCrud()
        ->overrideTemplate('crud/field/association', 'admin/field/association.html.twig');
    }*/

   public function configureActions(): Actions
    {
        return Actions::new()
            ->addBatchAction(Action::BATCH_DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, Action::EDIT)
            ->add(Crud::PAGE_INDEX, Action::DELETE)

            ->add(Crud::PAGE_DETAIL, Action::EDIT)
            ->add(Crud::PAGE_DETAIL, Action::INDEX)
            ->add(Crud::PAGE_DETAIL, Action::DELETE)

            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)

            ->add(Crud::PAGE_NEW, Action::SAVE_AND_RETURN)
            ->add(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER)
        ;
    }
   
   
}
