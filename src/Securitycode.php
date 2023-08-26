<?php

namespace Kdcwinner\Securitycode;

use Kdcwinner\Securitycode\Models\Securitycode as SecuritycodeModel;

class Securitycode
{
    public function data()
    {
        return SecuritycodeModel::getRandomData();
    }
    
    /* code to generate access security code */
    public function generateSecurityCode(){
        $code_length = 6;
        $min_value = 100000;
        $max_value = '';
        for ($i=0; $i < $code_length ; $i++) { 
            $max_value .= '9';
        }
        return $generated_code = rand($min_value,$max_value);   
    }

    public function checkContraints(){
        $code = -1;
        while (($this->checkPalindrome($code =$this->generateSecurityCode()) == -1)) {
            if($this->checkThreeNumerical($code) == -1){
                if($this->checkSequencialNumber($code,3) == -1){
                    return $code;
                }
            }
        }
        return $code;
    }

    /* checkPalindrome function checks given input is Palindrome or not and it return 1 if its palindrom eles -1*/
    public function checkPalindrome($input){   
        $return_value = -1;
        // applying strrev() function to input string
        $reverse = strrev($input);
        //condition to check if reverse and input strings are same or not
        if($reverse == $input)
            $return_value = 1;
        return $return_value;
    }

    /* checkThreeNumerical function will return */
    public function checkThreeNumerical($input){

        $return_value = -1;
        $arr_numbers = str_split($input);
        $arr_count = array_count_values($arr_numbers);
        foreach($arr_count as $val){
            if($val > 3){
                $return_value = 1;
                break;
            }
        }
        return $return_value;
    }

    public function checkSequencialNumber($str, $n_sequence_expected)
    {
        $chained = 1;
        $str_arr = str_split($str);
        for($i=1; $i<strlen($str); $i++)
        {
            if($str_arr[$i] == ($str_arr[$i-1] + 1))
            {
                $chained++;
                if($chained >= $n_sequence_expected)
                    return 1;
            }else{
                $chained = 1;
            }
        }
        return -1;
    }
}
