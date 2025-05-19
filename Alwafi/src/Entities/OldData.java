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
public class OldData {
    long id;
    long amount;

    public OldData(long id, long amount) {
        this.id = id;
        this.amount = amount;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setAmount(long amount) {
        this.amount = amount;
    }

    public long getId() {
        return id;
    }

    public long getAmount() {
        return amount;
    }
    
}
