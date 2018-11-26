<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Posts;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository(Posts::class)->findBy(array(), array('id' => 'DESC'));
        return $this->render(
            'default/index.html.twig',
            [
                'posts' => $posts,
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
