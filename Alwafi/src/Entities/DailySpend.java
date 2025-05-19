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
public class DailySpend {
    long id;
    String details;
    String date;
    long amount;

    public DailySpend(long id, String details, String date, long amount) {
        this.id = id;
        this.details = details;
        this.date = date;
        this.amount = amount;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setDetails(String details) {
        this.details = details;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public void setAmount(long amount) {
        this.amount = amount;
    }

    public long getId() {
        return id;
    }

    public String getDetails() {
        return details;
    }

    public String getDate() {
        return date;
    }

    public long getAmount() {
        return amount;
    }
    
    
}
