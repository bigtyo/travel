# -*- coding: utf-8 -*-
"""
Created on Tue Feb 03 14:26:13 2015

@author: raditya
"""


import re
import json
import datetime

class dataticket():
    idagent = 0
    namaagen = ""
    alamat = ""
    telepon = ""
    email = ""
    parent = 0
    username = ""
    gambar = ""
    active = 1
    alamat2 = ""
    alamat3 = ""
    kota = ""
    firstname = ""
    middlename = ""
    lastname = ""
    rute = ""
    salutation = ""
    tanggallahir = datetime.datetime(1975,1,1,0,0) 
    jenispenumpang = 0
    idmaskapaipulang = 0
    idmaskapaipergi= 0
    kodeterbangpergi = ""
    kodeterbangpulang = ""
    teleponpelanggan = ""
    
    def to_JSON(self):
        return json.dumps(self, default=lambda o: o.__dict__, sort_keys=True, indent=4)
        
    def formattanggal(self,tanggalunicode,separator,isusetime,monthfirst):
        d = datetime.datetime(*map(int, re.split('[^\d]', tanggalunicode)[:-1]))
        formattanggalbaru = ""
        if isusetime:
            if monthfirst:
                formattanggalbaru = self.formatdigit(d.month) +separator + self.formatdigit(d.day) + separator + str(d.year) + " " + self.formatdigit(d.hour) + ":" + self.formatdigit(d.minute)
            else:
                formattanggalbaru = self.formatdigit(d.day) +separator + self.formatdigit(d.month) + separator + str(d.year) + " " + self.formatdigit(d.hour) + ":" + self.formatdigit(d.minute)
        else:
            if monthfirst:
                formattanggalbaru = self.formatdigit(d.month) +separator + self.formatdigit(d.day) + separator + str(d.year)
            else:
                formattanggalbaru = self.formatdigit(d.day) +separator + self.formatdigit(d.month) + separator + str(d.year)
        return formattanggalbaru
    
    def formattanggal2(self,tanggalunicode,separator):
        d = datetime.datetime(*map(int, re.split('[^\d]', tanggalunicode)[:-1]))
        formattanggalbaru = ""
        formattanggalbaru = str(d.year) +separator + self.formatdigit(d.month) + separator + self.formatdigit(d.day)
        
        return formattanggalbaru
    
    def getrute(self,index):
        return re.split("-",self.rute)[index]
    
    @staticmethod
    def getdatetime(unicodedate):
        d = datetime.datetime(*map(int, re.split('[^\d]', unicodedate)[:-1]))
        
        return d
    
    def formatdigit(self,num):
        if num < 10:
            return "0" + str(num)
        else:
            return str(num)
    
    @staticmethod
    def monthtoname2(month):
        monthlist = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']
        
        return monthlist[month-1]    
    
    @staticmethod
    def monthtoname(month):
        monthlist = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
        
        return monthlist[month-1]