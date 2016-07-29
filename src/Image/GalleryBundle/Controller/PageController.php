<?php

namespace Image\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Image\GalleryBundle\Entity;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class PageController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $albums = $em->getRepository('ImageGalleryBundle:Album')->findAll();

        $session = $request->getSession();

        foreach ($albums as $alb){

            $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($alb->getId());

            $paginations[$alb->getId()] = $this->get('knp_paginator')->paginate($allImagesFromAlbum, $request->query->getInt('page', 1), 10);
//            $paginations[$alb->getId()]->setParam('albumId', $alb->getId());
            $paginations[$alb->getId()]->setParam('id', $alb->getId());
//            $paginations[$alb->getId()]->setUsedRoute('show_album_images');
            $paginations[$alb->getId()]->setUsedRoute('album_show_2');

            $session->set($alb->getId(), 1); //the initial value of the current page
        }

        return $this->render('ImageGalleryBundle:Page:index.html.twig', array(
            'albums'    => $albums,
            'paginations' => $paginations,
        ));
    }
    
//    public function showAlbumImagesAction(Request $request)
//    {
//        $albumId = $request->query->get('albumId'); // id current album
//        $page = $request->query->get('page'); // current page for current album
//
//        $em = $this->getDoctrine()->getManager();
//        $albums = $em->getRepository('ImageGalleryBundle:Album')->findAll();
//
//        $session = $request->getSession();
//
//        foreach ($albums as $alb){
//
//            $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($alb->getId());
//            $paginations[$alb->getId()] = $this->get('knp_paginator')->paginate($allImagesFromAlbum, $session->get($alb->getId()), 10);
//            $paginations[$alb->getId()]->setParam('albumId', $alb->getId());
//            $paginations[$alb->getId()]->setUsedRoute('show_album_images');
//
//            $session->set($albumId, $page); //current page for current album
//        }
//        return $this->render('ImageGalleryBundle:Page:index.html.twig', array(
//            'albums'    => $albums,
//            'paginations' => $paginations,
//        ));
//    }

//    public function showAlbumImagesJSAction()
//    {
//        $albumId = $_GET['id'];
//        $page = $_GET['page'];
//
//        $em = $this->getDoctrine()->getManager();
//
//        $serializer = $this->get('jms_serializer');
//
//        $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($albumId);
//        $paginations[$albumId] = $this->get('knp_paginator')->paginate($allImagesFromAlbum, $page, 10);
//        $paginations[$albumId]->setParam('albumId', $albumId);
//
//        $response = $serializer->serialize($paginations,'json');
//        return new Response(array('response' =>$response,
//        ));
//    }

    public function returnHTMLAction()
    {
        $lReturn = array();

        $albumId = $_GET['id'];
        $page = $_GET['page'];

        $em = $this->getDoctrine()->getManager();
        $album = $em->getRepository('ImageGalleryBundle:Album')->find($albumId);

        $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($albumId);
        $paginations[$albumId] = $this->get('knp_paginator')->paginate($allImagesFromAlbum, $page, 10);
//        $paginations[$albumId]->setParam('albumId', $albumId);
        $paginations[$albumId]->setParam('id', $albumId);
//        $paginations[$albumId]->setUsedRoute('show_album_images');
        $paginations[$albumId]->setUsedRoute('album_show_2');
        
        
        //use renderview instead of render, because renderview returns the rendered template
        $lReturn['html'] = $this->renderView('ImageGalleryBundle:Page:index_2.html.twig', array(
            'album'    => $album,
            'paginations' => $paginations,
        ));
//200 = Response::HTTP_OK => 200 OK — успешный запрос.
// Если клиентом были запрошены какие-либо данные, то они находятся в заголовке и/или теле сообщения.
        return new Response(json_encode($lReturn), 200, array('Content-Type'=>'application/json'));
    }
}
