# -*- coding: utf-8 -*-
"""
Created on Tue Feb 03 02:06:09 2015

@author: raditya
"""
import mysql.connector


database = {'user': 'root','password': 'radityabp','host': 'localhost','database': 'travel','raise_on_warnings': True,}
filedestpath = "C:\\xampp\\htdocs\\travel\\result\\"


def getloginandpass(kode):
    cnx = mysql.connector.connect(**database)
    query2 = ("select a.login,a.password from masterloginmaskapai a where idmastermaskapai = %s")
    cursor = cnx.cursor()
    cursor.execute(query2,(kode,))
    
    login = ""
    password = ""
    for (login,password) in cursor:
        login = login
        password = password
    
    cursor.close()
    cnx.close()
    
    return [login,password]