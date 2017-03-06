<?php

namespace ObryC\ComalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ObryC\ComalBundle\Entity\Mail;
use ObryC\ComalBundle\Form\MailType;

class ContactController extends Controller
{
  public function indexAction(Request $request)
  {
    $mail = new Mail();
	  
	$formContact = $this->get('form.factory')->create(MailType::class, $mail);	
	
	//Si le formulaire a été validé
	if ($request->isMethod('POST') && $formContact->handleRequest($request)->isValid()) 
	{
		//Enregistrement dans la BDD
		$em = $this->getDoctrine()->getManager();
		$em->persist($mail);
		$em->flush();
		
		//Envoi du message par mail
		$sujet = $formContact->get('sujet')->getData();
		$mailSrc = $formContact->get('mailSrc')->getData();
		$message = $formContact->get('message')->getData();
		
		$message = \Swift_Message::newInstance()
		->setContentType('text/html')
        ->setSubject($sujet)
        ->setFrom($mailSrc)
        ->setTo('minibouc@hotmail.com')
        ->setBody($message)                	
		;		
		$this->get('mailer')->send($message);
		
			
		$request->getSession()->getFlashBag()->add('notice', 'Mail correctement envoyé');
		return $this->redirectToRoute('obry_c_comal_contactus');
	}
	//Si le formulaire n'est pas validé on l'affiche
	else{	
		return $this->render('ObryCComalBundle:Contact:index.html.twig', array('formContact' => $formContact->createView(),));
	}
  }   
}