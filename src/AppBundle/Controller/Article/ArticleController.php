<?php
/**
 * Created by PhpStorm.
 * User: HMD
 * Date: 30/03/2016
 * Time: 09:41
 */

namespace AppBundle\Controller\Article;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;




class ArticleController extends Controller
{
    public function listAction()
    {

    }

    /**
     * @Route("/{id}")
     *
     * @param $id
     *
     * @return Response
     */
    public function showAction($id)
    {
        return new Response('Article avec l\'id '.$id);

    }




}