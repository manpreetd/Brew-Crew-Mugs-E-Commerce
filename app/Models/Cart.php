<?php

namespace App\Models;

use Psy\Command\ListCommand\FunctionEnumerator;

class Cart 
{
    // Method to convert cents to price format
    public function centsToPrice($cents){

        return number_format($cents / 100, 2);
        
    }
     // Method to calculate the unit price of an item
    public static function unitPrice($item){

        // Calculate and return the unit price
        return (new self)->centsToPrice($item['product']['price'] * $item['quantity']);
    }

    // Method to calculate the total amount of the cart
    public static function totalAmount(){

        $total = 0; 

        // Loop through each item in the cart
        foreach(session('cart') as $item){
            // Calculate the unit price of the item and add it to the total
            $total += self::unitPrice($item); 
        }
        return $total; 
    }
}
