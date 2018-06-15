package domain;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.*;

/**
 *
 * @author sunme114
 */
public class Order {
    private String orderId;
    private String date;
    private Collection<OrderItem> order = new ArrayList();
    private Product product;
    
    public Order(String orderId,String date) {
        this.orderId = orderId;
        this.date = date;
    }

    public String getOrderId() {
        return orderId;
    }

    public String getDate() {
        return date;
    }
   
    public double getTotal(){
        
        double theResult = 0;
        
        for (OrderItem orderItem : order) {
            theResult += orderItem.getItemTotal();
        }
        
        return theResult;                                     
    }


    public void addItem(Product orderItem) {
        orderItem.add(product);
    }
}
