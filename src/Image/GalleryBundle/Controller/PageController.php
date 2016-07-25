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
            $paginations[$alb->getId()]->setParam('albumId', $alb->getId());
            $paginations[$alb->getId()]->setUsedRoute('show_album_images');

            $session->set($alb->getId(), 1); //the initial value of the current page
        }

        return $this->render('ImageGalleryBundle:Page:index.html.twig', array(
            'albums'    => $albums,
            'paginations' => $paginations,
        ));
    }
    
    public function showAlbumImagesAction(Request $request)
    {
        $albumId = $request->query->get('albumId'); // id current album
        $page = $request->query->get('page'); // current page for current album

        $em = $this->getDoctrine()->getManager();
        $albums = $em->getRepository('ImageGalleryBundle:Album')->findAll();

        $session = $request->getSession();

        foreach ($albums as $alb){

            $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($alb->getId());
            $paginations[$alb->getId()] = $this->get('knp_paginator')->paginate($allImagesFromAlbum, $session->get($alb->getId()), 10);
            $paginations[$alb->getId()]->setParam('albumId', $alb->getId());
            $paginations[$alb->getId()]->setUsedRoute('show_album_images');
            
            $session->set($albumId, $page); //current page for current album
        }
        return $this->render('ImageGalleryBundle:Page:index.html.twig', array(
            'albums'    => $albums,
            'paginations' => $paginations,
        ));
    }

    public function showAlbumImagesJSAction()
    {
//        $em = $this->getDoctrine()->getManager();
//        $albums = $em->getRepository('ImageGalleryBundle:Album')->findAll();
//        $response = array();
//        foreach ($albums as $alb){
//            $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($alb->getId());
//            $response[$alb->getId()] = array(
//                'albumId' => $alb->getId(),
//                'albumName' => $alb->getName(),
//                'images' => $allImagesFromAlbum
//            );
//        }
//        $s = json_encode($response);
//        return new JsonResponse(json_encode($response));



//        //pattern number two - return JSON
//
//        $em = $this->getDoctrine()->getManager();
//        $albums = $em->getRepository('ImageGalleryBundle:Album')->findAll();
//
//        $serializer = $this->get('jms_serializer');
//
//        // Image object is converted to an array of pictures
//        foreach ($albums as $alb){
//            $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($alb->getId());
//            $response_temp[$alb->getId()] = array(
//                'albumId' => $alb->getId(),
//                'albumName' => $alb->getName(),
//                'images' => $allImagesFromAlbum);
//        }
//
//        $response = $serializer->serialize($response_temp,'json');
//        return new Response($response);

        //pattern number thre

//        $albumId = $request->query->get('albumId'); // id current album
//        $page = $request->query->get('page'); // current page for current album

        $albumId = $_GET['id'];
        $page = $_GET['page'];


        $em = $this->getDoctrine()->getManager();
        $albums = $em->getRepository('ImageGalleryBundle:Album')->findAll();

        $serializer = $this->get('jms_serializer');

//        foreach ($albums as $alb){
//
//            $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($alb->getId());
//            $paginations[$alb->getId()] = $this->get('knp_paginator')->paginate($allImagesFromAlbum, $page, 10);
//            $paginations[$alb->getId()]->setParam('albumId', $alb->getId());
////            $paginations[$alb->getId()]->setUsedRoute('show_album_images');
//
//        }



            $allImagesFromAlbum = $em->getRepository('ImageGalleryBundle:Image')->getImagesForAlbum($albumId);
            $paginations[$albumId] = $this->get('knp_paginator')->paginate($allImagesFromAlbum, $page, 10);
            $paginations[$albumId]->setParam('albumId', $albumId);
//            $paginations[$alb->getId()]->setUsedRoute('show_album_images');



        $response = $serializer->serialize($paginations,'json');
        return new Response($response);
        
//        return $this->render('ImageGalleryBundle:Page:index.html.twig', array(
//            'albums'    => $albums,
//            'paginations' => $paginations,
//        ));


    }
}
