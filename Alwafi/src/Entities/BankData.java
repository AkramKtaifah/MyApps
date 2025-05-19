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
public class BankData {
    long id;
    String details;
    double withdraw;
    double deposit;
    String date;
    double balance;

    public BankData(long id, String details, double withdraw, double deposit, String date, double balance) {
        this.id = id;
        this.details = details;
        this.withdraw = withdraw;
        this.deposit = deposit;
        this.date = date;
        this.balance = balance;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setDetails(String details) {
        this.details = details;
    }

    public void setWithdraw(double withdraw) {
        this.withdraw = withdraw;
    }

    public void setDeposit(double deposit) {
        this.deposit = deposit;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public void setBalance(double balance) {
        this.balance = balance;
    }

    public long getId() {
        return id;
    }

    public String getDetails() {
        return details;
    }

    public double getWithdraw() {
        return withdraw;
    }

    public double getDeposit() {
        return deposit;
    }

    public String getDate() {
        return date;
    }

    public double getBalance() {
        return balance;
    }
    
    
}
