/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Entities;

/**
 *
 * @author AkramKutifah
 */
public class Employee {
    long id;
    String name;
    long amount;
    String date;

    public Employee(long id, String name, long amount, String date) {
        this.id = id;
        this.name = name;
        this.amount = amount;
        this.date = date;
    }
    
    public Employee(long id, String name) {
        this.id = id;
        this.name = name;
    }
    
    public void setId(long id) {
        this.id = id;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setAmount(long amount) {
        this.amount = amount;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public long getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public long getAmount() {
        return amount;
    }

    public String getDate() {
        return date;
    }
    
    
}
