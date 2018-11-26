<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository(Posts::class)->findBy(array(), array('id' => 'DESC'));
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render(
            'default/index.html.twig',
            [
                'posts' => $posts,
                'categories' => $categories,
            ]
        );
    }

    /**
     * @Route("category/{id}", name="view_cat")
     * @param $id
     */
    public function viewCat($id)
    {
        $posts = $this->getDoctrine()->getRepository(Posts::class)->findBy(array('category' => $id));
        var_dump($posts);
        exit;
    }
}
