package Entities;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Akram Kutifah
 */
public class Bill {
    long id = 0;
    String type = null;
    String name = null;
    double quantity = 0.0;
    double price = 0.0;
    double total = 0.0;

    public Bill(long id, String type, String name, double quantity, double price, double total) {
        this.id = id;
        this.type = type;
        this.name = name;
        this.quantity = quantity;
        this.price = price;
        this.total = total;
    }

    public long getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public double getPrice() {
        return price;
    }

    public double getQuantity() {
        return quantity;
    }

    public double getTotal() {
        return total;
    }

    public String getType() {
        return type;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public void setQuantity(double quantity) {
        this.quantity = quantity;
    }

    public void setTotal(double total) {
        this.total = total;
    }

    public void setType(String type) {
        this.type = type;
    }
    
    
}
