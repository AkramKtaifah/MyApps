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
public class PlanData {
    String tage;
    String name;

    public PlanData(String tage, String name) {        
        this.tage = tage;
        this.name = name;
    }

    public void setTage(String tage) {
        this.tage = tage;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getTage() {
        return tage;
    }
    
    public String getName() {
        return name;
    }

}
