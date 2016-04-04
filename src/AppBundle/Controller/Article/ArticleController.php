<?php
namespace AppBundle\Controller\Article;
use AppBundle\Entity\Article\Article;
use AppBundle\Form\Article\ArticleType;
use AppBundle\Repository\Article\ArticleRepository;
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
        $author = 'moi';
        $articles = $articleRepository->findBy([
            'author' => $author
        ]);
        //dump($articles);
        return new Response('List of article');
    }
    /**
     * @Route("/new", name="article_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(ArticleType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->redirectToRoute('article_list');
        }
        return $this->render('AppBundle:Article:new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
