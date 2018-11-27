<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Posts;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

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
     * @Route("/register", name="register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'default/register.html.twig',
            [
                'form' => $form->createView(),
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

    /**
     * Generate TOP menu
     * @param UserInterface|null $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function GetMenuAction(UserInterface $user = null)
    {
        return $this->render(
            'menu.html.twig',
            [
                'user' => $user,
            ]
        );
    }

    /**
     * Generate Categories
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCategoriesAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render(
            'categories.html.twig',
            [
                'categories' => $categories,
            ]
        );
    }
}
