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
public class ProjectDetail {
    
    long id;
    String details;
    long amount;
    String date;

    public ProjectDetail(long id, String details, long amount, String date) {
        this.id = id;
        this.details = details;
        this.amount = amount;
        this.date = date;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setDetails(String details) {
        this.details = details;
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
    
    public String getDetails() {
        return details;
    }

    public long getAmount() {
        return amount;
    }

    public String getDate() {
        return date;
    }
    
    
}
