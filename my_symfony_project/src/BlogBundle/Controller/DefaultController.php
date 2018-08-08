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

}
