package Utilities;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.sql.*;

/**
 *
 * @author Akram Kutifah
 */
public class DatabaseOperations {
    
    Connection connect = null;
    Statement statement = null;
    
    public DatabaseOperations() throws Exception{
        try{
        String driver = "com.mysql.jdbc.Driver";
        Class.forName(driver).newInstance();
            
            connect = DriverManager.getConnection("jdbc:mysql://localhost:3306/store?zeroDateTimeBehavior=convertToNull&useUnicode=yes&characterEncoding=UTF-8", "root", "");
            statement = connect.createStatement();
        }catch(Exception e){
            
            connect = DriverManager.getConnection("jdbc:mysql://localhost:3306/", "root", "");
            statement = connect.createStatement();
            String sql = "create database store collate utf8_general_ci";
            statement.executeUpdate(sql);
            connect = DriverManager.getConnection("jdbc:mysql://localhost:3306/store?zeroDateTimeBehavior=convertToNull&useUnicode=yes&characterEncoding=UTF-8", "root", "");
            statement = connect.createStatement();
        }
    }
    
    public void insert(String s) throws SQLException{
        statement.executeUpdate(s);
    }
    
    public void update(String s) throws SQLException{
        statement.executeUpdate(s);
    }
    
    public void delete(String s) throws SQLException{
        statement.executeUpdate(s);
    }
    
    public ResultSet select(String s) throws SQLException{
        return statement.executeQuery(s);
    }
    
    public boolean execute(String s) throws SQLException{
        return statement.execute(s);
    }
    
    public ResultSet getNameOfTables () throws SQLException{
        DatabaseMetaData md = connect.getMetaData();
        return md.getTables(null, null, "%", null);
    }
    
    public void close() throws SQLException{
        this.statement.close();
        this.connect.close();
    }
}