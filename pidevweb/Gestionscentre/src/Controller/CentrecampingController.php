<?php

namespace App\Controller;
use App\Entity\Centrecamping;
use App\Repository\CentrecampingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CentrecampingType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Knp\Snappy\Pdf;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use App\services\QrcodeService;
class CentrecampingController extends AbstractController
{
    /**
     * @Route("/centrecamping", name="centrecamping")
     */
    public function index(): Response
    {
        return $this->render('centrecamping/index.html.twig', [
            'controller_name' => 'CentrecampingController',
        ]);
    }
    /**
     * @Route("/centre/affiche", name="centre_list")
     */
    public function afficher(CentrecampingRepository $rep)
    {
        $centrecamping = $rep->findAll();
        return $this->render('centrecamping/Affichec.html.twig', [
            'centrecamping' => $centrecamping,
        ]);
    }
    /**
     * @Route("/centre/afficheFront", name="centre_list_Front")
     */
    public function afficherfront(CentrecampingRepository $rep)
    {    $qrCode = null;
        $centrecamping = $rep->findAll();
        return $this->render('centrecamping/AfficheCentreFront.html.twig', [
            'centrecamping' => $centrecamping,
            'qrCode' => $qrCode
        ]);
    }
    /**
     * @param $idc
     * @param CentrecampingRepository $rep
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("delete/{idc}", name="delc")
     */
    public function supprimer($idc,CentrecampingRepository $rep)
    {
        $centrecamping=$rep->find($idc);
        $em=$this->getDoctrine()->getManager();
        $em->remove($centrecamping);
        $em->flush();
        return $this->redirectToRoute('centre_list');

    }
    /**
     * @param Request $req
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/list/add", name="c_add")
     */

    public function addc(Request $req )
    {
        $centrecamping=new Centrecamping();
        $form=$this->createForm(CentrecampingType::class,$centrecamping);
        $form->add('Ajouter',SubmitType::class );
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($centrecamping);
            $em->flush();
            return $this->redirectToRoute('centre_list');
        }
        return $this->render('centrecamping/addc.html.twig', [
            'form' => $form->createView(),
        ]);


    }
    /**
     * @param Request $req
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("update/{idc}", name="modc")
     */
    public function update($idc,CentrecampingRepository $rep,Request $request){
        $centrecamping=$rep->find($idc);
        $form=$this->createForm(CentrecampingType::class,$centrecamping);
        $form->add('Modifier',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('centre_list');

        }
        return $this->render('centrecamping/updatec.html.twig', [
            'cupdate' => $form->createView(),
        ]);


    }

    /**
     * @Route("/centre/afficheParRegion/{idR}/{regionName}", name="centre_region")
     * @param CentrecampingRepository $rep
     * @param $idR
     * @param $regionName
     * @return Response
     */
    public function afficherParRegion(CentrecampingRepository $rep,$idR,$regionName)
    {
        $centrecamping = $rep->findAll();
        return $this->render('centrecamping/afficheCentreParRegion.html.twig', [
            'centrecamping' => $centrecamping,
            'idregion' => $idR,
            'regionname' => $regionName,
        ]);
    }

    /**
     * @Route("/centre/pdf", name="pdf")
     * @param Knp\Snappy\Pdf $knpSnappyPdf
     * @param CentrecampingRepository $rep
     * @return PdfResponse
     */
    public function pdf(Pdf $knpSnappyPdf,CentrecampingRepository $rep)
    {      $centrecamping = $rep->findAll();
        $html = $this->renderView('centrecamping/Affichecpdf.html.twig', array(
            'centrecamping' => $centrecamping,
        ));
        $knpSnappyPdf->setOption('enable-local-file-access', true);
        return new PdfResponse(
            $knpSnappyPdf->generateFromHtml(

                $this->renderView('centrecamping/Affichecpdf.html.twig', array(
                    'centrecamping' => $centrecamping,
                )),

                'c:\centersList.pdf'

            )
        );

    }

    /**
     * @Route("/centre/qrCode/{centerName}", name="Qrcode")
     * @param QrcodeService $qrcodeService
     * @param $centerName
     * @param CentrecampingRepository $rep
     * @return Response
     */
    public function qr( QrcodeService $qrcodeService,$centerName,CentrecampingRepository $rep): Response
    {

            $qrCode = $qrcodeService->qrcode($centerName);

        $centrecamping = $rep->findAll();
        return $this->render('centrecamping/AfficheCentreFront.html.twig', [
            'centrecamping' => $centrecamping,
            'qrCode' => $qrCode                            //qrcode image
        ]);
    }

}
