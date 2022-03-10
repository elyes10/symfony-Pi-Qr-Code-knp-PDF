<?php

namespace App\Controller;
use App\Entity\Region;
use App\Repository\RegionRepository;
use Doctrine\ORM\EntityManagerInterface;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\RegionType;

class RegionController extends AbstractController
{
    /**
     * @Route("/region", name="region")
     */
    public function index(): Response
    {
        return $this->render('region/index.html.twig', [
            'controller_name' => 'RegionController',
        ]);
    }
    /**
     * @Route("/region/affiche", name="region_list")
     */
    public function afficher(RegionRepository $rep)
    {
        $region = $rep->findAll();
        return $this->render('region/Afficher.html.twig', [
            'region' => $region,
        ]);
    }
    /**
     * @Route ("/region/delete/{idr}", name="delr")
     */
    public function supprimer(Region $region,Request $req,ManagerRegistry $objectmanager)
    {
        $em=$objectmanager->getManager();
       // $region=$rep->find($idr);
       // $em=$this->getDoctrine()->getManager();
        $em->remove($region);
        $em->flush();
        $this->addFlash("success","Region Deleted");   //Notification
        return $this->redirectToRoute('region_list');

    }
    /**
     * @param Request $req
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/list/addr", name="r_add")
     */

    public function addr(Request $req ,EntityManagerInterface $entityManager)
    {
        $region=new Region();
        $form=$this->createForm(RegionType::class,$region);
        $form->add('Ajouter',SubmitType::class );
        $form->handleRequest($req);
         if($form->isSubmitted() && $form->isValid())
        {
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($region);
            $entityManager->flush();
            $this->addFlash("success","Region Added");   //Notification
            return $this->redirectToRoute('region_list');
        }
        return $this->render('region/addr.html.twig', [
            'form' => $form->createView(),
        ]);


    }
    /**
     * @param Request $req
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("updater/{idr}", name="modr")
     */
    public function update($idr,RegionRepository $rep,Request $request){
        $region=$rep->find($idr);
        $form=$this->createForm(RegionType::class,$region);
        $form->add('Modifier',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash("success","Region Updated");   //Notification
            return $this->redirectToRoute('region_list');

        }
        return $this->render('region/updater.html.twig', [
            'rupdate' => $form->createView(),
        ]);


    }
    /**
     * @Route("/region/afficheFront", name="region_front")
     */
    public function afficherfrontRegion(RegionRepository $rep)
    {
        $region = $rep->findAll();
        return $this->render('region/afficheRegionFront.html.twig', [
            'region' => $region,
        ]);
    }
}
