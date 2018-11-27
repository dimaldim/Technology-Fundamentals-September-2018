<?php
namespace TestBundle\Entity;

class Calculator
{
    /*
     * @var float
     */
   private $leftOperand;
   /*
    * @var float
    */
   private $rightOperand;
   /*
    * @var string
    */
   private $operator;

    /**
     * @return float
     */
    public function getLeftOperand()
    {
        return $this->leftOperand;
    }

    /**
     * @param float $leftOperand
     * @return Calculator
     */
    public function setLeftOperand($leftOperand)
    {
        $this->leftOperand = $leftOperand;
        return $this;
    }

    /**
     * @return float
     */
    public function getRightOperand()
    {
        return $this->rightOperand;
    }

    /**
     * @param float $rightOperand
     * @return Calculator
     */
    public function setRightOperand($rightOperand)
    {
        $this->rightOperand = $rightOperand;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param string $operator
     * @return Calculator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

}