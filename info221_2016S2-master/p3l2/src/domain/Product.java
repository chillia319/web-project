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

public class Product {
   private String productId;
   private String productName;
   private String description;
   private String category;
   private double price;
   private int quantityinStock;
   
   public Product(String productId,String productName,String description,String category,double price,int quantityinStock){
    this.productId = productId;
    this.productName = productName;
    this.description = description;
    this.category = category;
    this.price = price;
    this.quantityinStock = quantityinStock;
   }
    public String toString(){
        String display = "";
        display = display + productId +productName  + description + category + Double.toString(price) + Integer.toString(quantityinStock);
        return display;
    }
    
    public String getProductId() {
        return productId;
    }

    public void setProductId(String productId) {
        this.productId = productId;
    }

    public String getProductName() {
        return productName;
    }

    public void setProductName(String productName) {
        this.productName = productName;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public int getQuantityinStock() {
        return quantityinStock;
    }

    public void setQuantityinStock(int quantityinStock) {
        this.quantityinStock = quantityinStock;
    }

    void add(Product Product) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}

