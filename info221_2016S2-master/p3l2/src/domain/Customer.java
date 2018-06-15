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

public class Customer {
  private final String uniqueId;
  private final String username;
  private final int cardNumber;
  private final String password;

public Customer(String uniqueId,String username,int cardNumber, String password){
    this.uniqueId = uniqueId;
    this.username = username;
    this.cardNumber = cardNumber;
    this.password = password;
}
    public String getUniqueId() {
        return uniqueId;
    }

    public String getUsername() {
        return username;
    }

    public int getCardNumber() {
        return cardNumber;
    }

    public String getPassword() {
        return password;
    }

  @Override
    public String toString() {
        return "Customer{" + "uniqueId=" + uniqueId + ", username=" + username + '}';
    }
  
}

