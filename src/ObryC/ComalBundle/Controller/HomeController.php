<?php

namespace ObryC\ComalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
  public function indexAction()
  {
    $content = $this->get('templating')->render('ObryCComalBundle:Home:index.html.twig');
    
    return new Response($content);
  }     
}