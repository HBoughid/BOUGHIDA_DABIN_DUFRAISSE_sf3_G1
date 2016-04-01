<?php
namespace AppBundle\Controller\Article;
use AppBundle\Entity\Article\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ArticleController extends Controller
{
    /**
     * @Route("/{id}", requirements={"id" = "\d+"}, name="article_show")
     *
     * @param $id
     *
     * @return Response
     */
    public function showAction($id, Request $request)
    {
        $tag = $request->query->get('tag');
        return new Response('Article avec l\'id '.$id.' avec le tag: '.$tag);
    }
    /**
     * @Route("/list", name="article_list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository('AppBundle:Article\Article');

        $author = "moi";

        $articles = $articleRepository->findBy([
            'author' => $author
        ]);

        dump($articles);

        return new Response('List of article');
    }
    /**
     * @Route("/new", name="article_new")
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();
        $article = new Article();
        $article
            ->setTitle('Osef du titre')
            ->setContent('blabla bla')
            ->setTag('osef')
            ->setCreatedAt(new \DateTime())
        ;
        $em->persist($article);
        $em->flush();
        return new Response('Article created');
    }
}
