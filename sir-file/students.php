<?php

class Students{

   protected $name;
 
   public function __construct($name)
   {
      $this->name = $name;
   }

   public function setName(string $pass_name)
   {
        $this->name = $pass_name;
        
   }  
   
  abstract function getName(); 

   public static function sum( $a , $b )
   {
      $sum_result = $a + $b ; 
      return $sum_result;
   }
}

class Result extends Students{

   public $percentage ;

   public function __construct( $name , $percentage)
   {
      $this->name          = $name;
      $this->percentage    = $percentage;
   }
   public function getPercentage()
   {
        return  $this->percentage;
    }
   public function setStudent($pass_name)
   {
            $this->name = $pass_name;
   }
   public function setPercentage($pass_per)
   {
        $this->percentage = $pass_per;
   }
   public function getName(){
      return "Your Name is:".$this->name;
   }


}
   
 


 

 $result = new Result("Khursheed", "85%");

 var_dump($result);