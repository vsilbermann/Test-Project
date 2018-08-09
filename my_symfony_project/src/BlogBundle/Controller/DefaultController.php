<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $_strName='Vika';

        return $this->render('BlogBundle:Default:index.html.twig', ['name' => $_strName]);
    }

    public function listAction($page)
    {
        $_strName='List to Page:  page: '.$page;

        return $this->render('BlogBundle:Default:list.html.twig', ['name' => $_strName]);
    }

    public function showAction($slug)
    {

        $url = $this->generateUrl('blog_show', ['slug' => $slug]);

        return $this->render('BlogBundle:Default:show.html.twig', ['url' => $url]);
    }

    public function streamAction($slug)
    {

        $urlWhole = $this->generateUrl('blog_stream', ['slug' => $slug]);

        $urlAlternativ = $this->get('router')->generate('blog_stream', ['slug' => $slug,'category' => 'Symfony']);

        return $this->render('BlogBundle:Default:stream.html.twig', ['url' => $urlWhole,'param'=>$slug,'url_aternative'=>$urlAlternativ]);
    }
}
