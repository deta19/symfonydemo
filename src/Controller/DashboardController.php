<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\TeamHtml;
use App\Entity\TeamProject;
use App\Form\AddHtmlType;
use App\Form\AddProjectType;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="app_dashboard")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repository =  $em->getRepository(TeamHtml::class);
        $all_data =  $repository->findAll();

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'all_data' => $all_data
        ]);
        
    }
    
    
    /**
     * @Route("/dashboard/add_html", name="app_add_html")
     */
    public function add_html(Request $request): Response
    {
       
        $formHtml = $this->createForm(AddHtmlType::class);
        
        if ($request->isMethod('POST')) {
            
            $formHtml->handleRequest($request);

            if ($formHtml->isSubmitted() && $formHtml->isValid()) {
                $teamHtml = new TeamHtml();
                $em = $this->getDoctrine()->getManager();
                $form_data = $formHtml->getData();
                
                $teamHtml->setHtml($form_data->getHtml());
                $teamHtml->setCss($form_data->getCss());
                $teamHtml->setProjectId($form_data->getProjectId());
              
                $em->persist($teamHtml);

                $em->flush();
                return $this->redirectToRoute('app_dashboard');
            }
        }
        

        
        return $this->render('dashboard/addhtml.html.twig', [
            'controller_name' => 'DashboardController',
            'formHtml' => $formHtml->createView(),
        ]);
        
    }
    
    /**
     * @Route("/dashboard/add_project", name="app_add_project")
     */
    public function add_project(Request $request): Response
    {
        $formProject = $this->createForm(AddProjectType::class);
        
        if ($request->isMethod('POST')) {
            
            $formProject->handleRequest($request);

            if ($formProject->isSubmitted() && $formProject->isValid()) {
                $teamProject = new TeamProject();
                $em = $this->getDoctrine()->getManager();
                $form_data = $formProject->getData();
                
                $teamProject->setName($form_data->getName());
                $teamProject->setUserId($form_data->getUserId());
              
                $em->persist($teamProject);

                $em->flush();
                return $this->redirectToRoute('app_dashboard');
            }
        }
        
        return $this->render('dashboard/addproject.html.twig', [
            'controller_name' => 'DashboardController',
            'formProject' => $formProject->createView()
        ]);
        
    }
}
