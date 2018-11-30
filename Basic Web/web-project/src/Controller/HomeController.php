<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\User;
use App\Form\CreatePostType;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findBy(
            array(),
            [
                'id' => 'DESC',
            ]
        );

        return $this->render(
            'home/index.html.twig',
            [
                'posts' => $posts,
            ]
        );
    }

    /**
     * @Route("/post", name="create_post")
     */
    public function post(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $post = new Post();
        $form = $this->createForm(CreatePostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post->setCreatedAt(new \DateTime());
            /** @var \App\Entity\User $user */
            $user = $this->getUser();
            $post->setAuthor($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'home/createpost.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'security/register.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/view/{id}", name="view_cat")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function viewCat($id)
    {
        if (!$this->getDoctrine()->getRepository(Category::class)->find($id)) {
            return $this->redirectToRoute('home');
        }
        $repo = $this->getDoctrine()->getRepository(Post::class);
        $posts = $repo->findByCategory($id);

        return $this->render(
            'home/category.html.twig',
            [
                'posts' => $posts,
                'catName' => $this->getDoctrine()->getRepository(Category::class)->find($id),
            ]
        );
    }

    public function generateMenu()
    {

        return $this->render('menu.html.twig');
    }

    public function generateCats()
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
