/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package domain;

/**
 *
 * @author sunme114
 */


public class OrderItem{
    private int quantityPurchased;
    private double purchasePrice;
    public OrderItem(int quantityPurchased,double purchasePrice){ 
        this.quantityPurchased = quantityPurchased;
        this.purchasePrice = purchasePrice;
}
    
    public double getItemTotal(){
    double totalPrice;
    totalPrice = quantityPurchased*purchasePrice;
    return totalPrice;
    }

    public int getQuantityPurchased() {
        return quantityPurchased;
    }

   

    public double getPurchasePrice() {
        return purchasePrice;
    }

  
}
