/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAO;
import java.util.*;
import domain.Product;
/**
 *
 * @author sunme114
 */

public class ProList {
    private static ArrayList<Product> productsList = new ArrayList(); 
    private static ArrayList<String> category = new ArrayList();

    public void addingItem(Product product){
        productsList.add(product);
        category.add(product.getCategory());
    }
    public  ArrayList<Product> getProductsList() {
        return productsList;
    }
    public ArrayList getCategory(){
        return category;
    }
}

 
