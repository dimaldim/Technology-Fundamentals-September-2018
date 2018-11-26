<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller
{
    public function getCategoriesAction()
    {
      $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
      return $this->render('categories.html.twig',
          [
             'categories' => $categories
          ]);
    }
}
