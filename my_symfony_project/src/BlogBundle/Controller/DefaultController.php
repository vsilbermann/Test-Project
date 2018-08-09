<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $_strName='Vika';

        $request->isXmlHttpRequest(); // is it an Ajax request?

        $request->getPreferredLanguage(array('en', 'fr'));

        // retrieves GET and POST variables respectively
        $request->query->get('page');
        $request->request->get('page');

        // retrieves SERVER variables
        $request->server->get('HTTP_HOST');

        // retrieves an instance of UploadedFile identified by foo
        $request->files->get('foo');

        // retrieves a COOKIE value
        $request->cookies->get('PHPSESSID');

        // retrieves an HTTP request header, with normalized, lowercase keys
        $request->headers->get('host');
        $request->headers->get('content_type');

        // Response Operatiorn
        // creates a simple Response with a 200 status code (the default)
        $response = new Response('Hello '.$name, Response::HTTP_OK);

        // JsonResponse is a sub-class of Response
        $response = new JsonResponse(array('name' => $name));
        // sets a header!
        $response->headers->set('X-Rate-Limit', 10);


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

    public function streamAction(Request $request, $slug)
    {

        $urlWhole = $this->generateUrl('blog_stream', ['slug' => $slug]);

        $urlAlternativ = $this->get('router')->generate('blog_stream', ['slug' => $slug,'category' => 'Symfony']);


        //var_dump($request);

        return $this->render('BlogBundle:Default:stream.html.twig', ['url' => $urlWhole,'param'=>$slug,'url_aternative'=>$urlAlternativ]);
    }

    public function redirectAction()
    {

        // redirects to the "homepage" route
       // return $this->redirectToRoute('blog_homepage');

        // does a permanent - 301 redirect
        return $this->redirectToRoute('blog_homepage', array(), 301);

        // redirects to a route with parameters
       // return $this->redirectToRoute('blog_show', array('slug' => 'my-page'));

        // redirects externally
       // return $this->redirect('http://symfony.com/doc');

    }
}
