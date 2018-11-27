<?php

namespace TestBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use TestBundle\Entity\Calculator;
use TestBundle\Form\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CalculatorController extends Controller
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $calculator = new Calculator();
        $form = $this->createForm(CalculatorType::class, $calculator);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $leftOperand = $calculator->getLeftOperand();
            $rightOperand = $calculator->getRightOperand();
            $operator = $calculator->getOperator();
            $result = 0;
            switch ($operator) {
                case '+':
                    $result = $leftOperand + $rightOperand;
                    break;
                case '-':
                    $result = $leftOperand - $rightOperand;
                    break;
                case '*':
                    $result = $leftOperand * $rightOperand;
                    break;
                case '/':
                    $result = $leftOperand / $rightOperand;
                    break;
                case '^':
                    $result = pow($leftOperand, $rightOperand);
                    break;
                case 'AND':
                    $result = $leftOperand & $rightOperand;
                    break;
                case 'OR':
                    $result = $leftOperand | $rightOperand;
                    break;
                case 'XOR':
                    $result = $leftOperand ^ $rightOperand;
                    break;
                case 'Shift Left':
                    $result = $leftOperand << $rightOperand;
                    break;
                case 'Shift Right':
                    $result = $leftOperand >> $rightOperand;
                    break;
            }
            if($request->isXmlHttpRequest()) {
                $json = array();
                $json[] = $result;
                return new JsonResponse($json);
            }
            return $this->render('calculator/index.html.twig',
                ['result' => $result, 'calculator' => $calculator, 'form' => $form->createView()]);
        }
        return $this->render('calculator/index.html.twig');
    }
}
