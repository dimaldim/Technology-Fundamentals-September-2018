<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;

class UserController extends Controller
{
    public function GetMenuAction(UserInterface $user = null)
    {
        return $this->render('menu.html.twig',
            [
                'user' => $user
            ]);
    }
}
