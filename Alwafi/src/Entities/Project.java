package Entities;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author AkramKutifah
 */
public class Project {
    long id;
    String customer;
    String location;
    String notes;
    long ironAmount;
    long ironCost;
    long budget;

    public Project(long id, String customer, String location, String notes, long ironAmount, long ironCost, long budget) {
        this.id = id;
        this.customer = customer;
        this.location = location;
        this.notes = notes;
        this.ironAmount = ironAmount;
        this.ironCost = ironCost;
        this.budget = budget;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setCustomer(String customer) {
        this.customer = customer;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public void setNotes(String notes) {
        this.notes = notes;
    }
    
    public void setIronAmount(long ironAmount) {
        this.ironAmount = ironAmount;
    }

    public void setIronCost(long ironCost) {
        this.ironCost = ironCost;
    }

    public void setBudget(long budget) {
        this.budget = budget;
    }

    public long getId() {
        return id;
    }

    public String getCustomer() {
        return customer;
    }

    public String getLocation() {
        return location;
    }

    public String getNotes() {
        return notes;
    }
    
    public long getIronAmount() {
        return ironAmount;
    }

    public long getIronCost() {
        return ironCost;
    }

    public long getBudget() {
        return budget;
    }

    
}
