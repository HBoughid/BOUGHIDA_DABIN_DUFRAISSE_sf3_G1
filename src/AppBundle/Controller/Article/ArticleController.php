<?php
/**
 * Created by PhpStorm.
 * User: HMD
 * Date: 30/03/2016
 * Time: 09:41
 */

namespace AppBundle\Controller\Article;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



class ArticleController extends Controller
{

    /**
     * @Route("/{id}", requirements={"id" = "\id+"})
     *
     * @param $id
     *
     * @return Response
     */
    public function showAction($id, Resquest $request)
    {
        $tag = $request->query->get('tag');

        return new Response('Article avec l\'id '.$id.' avec le tag '.$tag);
    }

    /**
     * *@Route("/list")
     */

    public function listAction()
    {
        return new Response('list of article');
    }

}