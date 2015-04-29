# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException

import unittest, time, re,sys
import mysql.connector
import cfg, dataticket

class GarudaBooking(unittest.TestCase):
    def getairport(self,kode,direction):
        airports = [["AUH","Abu Dhabi Intl Arpt ","AUH","Abu Dhabi","AE","Uni Emirate Arab "],["DXB","Dubai International Airport","DXB","Dubai","AE","United Arab Emirates"],["BNE","Brisbane Airport","BNE","Brisbane","AU","Australia"],["MEL","Melbourne Airport","MEL","Melbourne","AU","Australia"],["PER","Perth Airport","PER","Perth","AU","Australia"],["SYD","Sydney Airport","SYD","Sydney","AU","Australia"],["PEK","Beijing Airport","BJS","Beijing","CN","China"],["CAN","Canton Airport","CAN","Canton","CN","China"],["PVG","Shanghai Pudong Airport","SHA","Shanghai","CN","China"],["HND","Haneda International Airport","TYO","Tokyo","JP","Japan"],["HKG","Chep Lap Kok Apt","HKG","Hongkong","HK","Hongkong"],["AMQ","Pattimura Airport","AMQ","Ambon","ID","Indonesia"],["BPN","Sepinggan Apt","BPN","Balik Papan","ID","Indonesia"],["BTJ","Sultan Iskandar Muda Airport","BTJ","Banda Aceh","ID","Indonesia"],["BDO","Husein Sastranegara Apt","BDO","Bandung","ID","Indonesia"],["BDJ","Syamsudin Noor Apt","BDJ","Banjar Masin","ID","Indonesia"],["BTH","Hang Nadim Apt","BTH","Batam","ID","Indonesia"],["BKS","Fatmawati Soekarno Arpt","BKS","Bengkulu","ID","Indonesia"],["BEJ","Kalimarau Arpt","BEJ","Berau","ID","INDONESIA"],["BIK","Frans Kaisiepo  Airport","BIK","Biak","ID","Indonesia"],["DPS","Ngurah Rai International Apt","DPS","Denpasar","ID","Indonesia"],["GTO","Jalaluddin Airport","GTO","Gorontalo","ID","Indonesia"],["GNS","Binaka Arpt","GNS","Gunung Sitoli \/ Nias","ID","Indonesia"],["CGK","Soekarno-hatta Intnl Apt","JKT","Jakarta","ID","Indonesia"],["DJB","Sultan Taha Syarifudin Airport","DJB","Jambi","ID","Indonesia"],["DJJ","Jayapura Airport","DJJ","Jayapura","ID","Indonesia"],["JOG","Adi Sucipto Intnl Apt","JOG","Jogyakarta","ID","Indonesia"],["KDI","Kendari Airport","KDI","Kendari","ID","Indonesia"],["KOE","Eltari Airport","KOE","Kupang","ID","Indonesia"],["TJQ","H.A.S. Hanandjoeddin Arpt","TJQ","Tanjung Pandan","ID","Indonesia"],["TKG","Beranti Apt","TKG","Lampung","ID","Indonesia"],["UPG","Hassanudin Airport .","UPG","Makassar","ID","Indonesia"],["MEQ","Cut Nyak Dhien Arpt","MEQ","Meulaboh","ID","Indonesia"],["MLG","Abdurahmansaleh Apt","MLG","Malang","ID","Indonesia"],["MDC","Sam Ratulangi Apt","MDC","Manado","ID","Indonesia"],["MKW","Manokwari Airport","MKW","Manokwari","ID","Indonesia"],["LOP","Selaparang Apt","LOP","Mataram","ID","Indonesia"],["LSW","Malikus Saleh Arpt","LSW","Lhok Seumawe","ID","Indonesia"],["KNO","Kuala Namu","MES","Medan","ID","Indonesia"],["PDG","Minangkabau Intnl Apt","PDG","Padang","ID","Indonesia"],["PKY","Tjilik Riwut Apt","PKY","Palangkaraya","ID","Indonesia"],["PLM","Sultan Badarudin Apt","PLM","Palembang","ID","Indonesia"],["PLW","Mutiara Airport","PLW","Palu","ID","Indonesia"],["PGK","Depati Amir Airport","PGK","Pangkalpinang","ID","Indonesia"],["PKU","Sultan Syarif Kasim I1 Pekanbaru","PKU","Pekan Baru","ID","Indonesia"],["PNK","Supadio Apt","PNK","Pontianak","ID","Indonesia"],["SRG","Achmad Yani Apt","SRG","Semarang","ID","Indonesia"],["SOC","Adisumarmo Intl Apt","SOC","Solo","ID","Indonesia"],["SOQ","Domine Eduard Osok Airport","SOQ","Sorong","ID","Indonesia"],["SUB","Juanda Intl Apt","SUB","Surabaya","ID","Indonesia"],["TNJ","Raja Haji Fisabilillah Intl Arpt","TNJ","Tanjung Pinang","ID","INDONESIA"],["TRK","Juwata Airport ","TRK","Tarakan","ID","Indonesia"],["TTE","Sultan Babullah Airport","TTE","Ternate","ID","Indonesia"],["TIM","Timika Apt","TIM","Timika","ID","Indonesia"],["KIX","Kansai Internasional Apt","OSA","Osaka","JP","Japan"],["NRT","Narita Internasional Apt","TYO","Tokyo","JP","Japan"],["ICN","Incheon Intnl Airport","SEL","Seoul ","KR","Korea"],["KUL","Klia Airport","KUL","Kuala Lumpur","MY","Malaysia"],["AMS","Schipol Internasional Apt","AMS","Amsterdam","NL","Netherland"],["JED","King Abdul Aziz Intl Apt","JED","Jeddah","SA","Saudi Arabia"],["SIN","Changi Airport","SIN","Singapore","SG","Singapore"],["BKK","Suvarnabhumi Intnl Apt","BKK","Bangkok","TH","Thailand"],["TPE","Chiang Kai Sek Apt","TPE","Taipei","TW","Taiwan"],["PEN","Penang International Airport","PEN","Penang Island","MY","Malaysia"],["LBJ","Komodo Airport","LBJ","Labuan Bajo","ID","Indonesia"],["BMU","Sultan M.Salahuddin  Airport","BMU","Bima","ID","Indonesia"],["ENE","H Hasan Aroeboesman Airport","ENE","Ende","ID","Indonesia"],["TMC","Waikabubak Airport","TMC","Tambolaka","ID","Indonesia"],["MKQ","Mopah Arpt","MKQ","Merauke","ID","Indonesia"],["BWX","Blimbingsari Airport","BWX","Banyuwangi","ID","Indonesia"],["JBB","Noto Hadinegoro Jember Airport","JBB","Jember","ID","Indonesia"],["FLZ","Dr Ferdinand Lumban Tobing Airport","FLZ","Sibolga","ID","Indonesia"],["CAN","Baiyun Intl Airport","CAN","Guangzhou","CN","China"],["BUW","Betoambari Airport","BUW","BAUBAU","ID","Indonesia"],["LUW","Syukuran Aminuddin Amir Airport","LUW","Luwuk","ID","Indonesia"],["MJU","Tampa Padang Airport","MJU","Mamuju","ID","Indonesia"],["PUM","Pomala Airport","PUM","Kolaka","ID","Indonesia"],["LGW","London Gatwick Airport","LON","London","GB","United Kingdom"],["LUV","Karel Satsuitubun Airport","LUV","Langgur","ID","Indonesia"],["PSU","Pangsuma Airport","PSU","Putussibau","ID","Indonesia"],["SXK","Mathilda Batlayeri Airport","SXK","Saumlaki","ID","Indonesia"],["SWQ","Brangbiji Airport","SWQ","Sumbawa","ID","Indonesia"],["DIL","Presidente Nicolau Lobato Intl Arpt","DIL","Dili","TL","Timor Leste"],["SBG","Maimun Saleh Arpt","SBG","Sabang","ID","Indonesia"]]
        airportsdest = [["AUH","Abu Dhabi Intl Arpt ","AUH","Abu Dhabi","AE","Uni Emirate Arab "],["DXB","Dubai International Airport","DXB","Dubai","AE","United Arab Emirates"],["BNE","Brisbane Airport","BNE","Brisbane","AU","Australia"],["MEL","Melbourne Airport","MEL","Melbourne","AU","Australia"],["PER","Perth Airport","PER","Perth","AU","Australia"],["SYD","Sydney Airport","SYD","Sydney","AU","Australia"],["PEK","Beijing Airport","BJS","Beijing","CN","China"],["CAN","Canton Airport","CAN","Canton","CN","China"],["PVG","Shanghai Pudong Airport","SHA","Shanghai","CN","China"],["HND","Haneda International Airport","TYO","Tokyo","JP","Japan"],["HKG","Chep Lap Kok Apt","HKG","Hongkong","HK","Hongkong"],["AMQ","Pattimura Airport","AMQ","Ambon","ID","Indonesia"],["BPN","Sepinggan Apt","BPN","Balik Papan","ID","Indonesia"],["BTJ","Sultan Iskandar Muda Airport","BTJ","Banda Aceh","ID","Indonesia"],["BDO","Husein Sastranegara Apt","BDO","Bandung","ID","Indonesia"],["BDJ","Syamsudin Noor Apt","BDJ","Banjar Masin","ID","Indonesia"],["BTH","Hang Nadim Apt","BTH","Batam","ID","Indonesia"],["BKS","Fatmawati Soekarno Arpt","BKS","Bengkulu","ID","Indonesia"],["BEJ","Kalimarau Arpt","BEJ","Berau","ID","INDONESIA"],["BIK","Frans Kaisiepo  Airport","BIK","Biak","ID","Indonesia"],["DPS","Ngurah Rai International Apt","DPS","Denpasar","ID","Indonesia"],["GTO","Jalaluddin Airport","GTO","Gorontalo","ID","Indonesia"],["GNS","Binaka Arpt","GNS","Gunung Sitoli \/ Nias","ID","Indonesia"],["CGK","Soekarno-hatta Intnl Apt","JKT","Jakarta","ID","Indonesia"],["DJB","Sultan Taha Syarifudin Airport","DJB","Jambi","ID","Indonesia"],["DJJ","Jayapura Airport","DJJ","Jayapura","ID","Indonesia"],["JOG","Adi Sucipto Intnl Apt","JOG","Jogyakarta","ID","Indonesia"],["KDI","Kendari Airport","KDI","Kendari","ID","Indonesia"],["KOE","Eltari Airport","KOE","Kupang","ID","Indonesia"],["TJQ","H.A.S. Hanandjoeddin Arpt","TJQ","Tanjung Pandan","ID","Indonesia"],["TKG","Beranti Apt","TKG","Lampung","ID","Indonesia"],["UPG","Hassanudin Airport .","UPG","Makassar","ID","Indonesia"],["MEQ","Cut Nyak Dhien Arpt","MEQ","Meulaboh","ID","Indonesia"],["MLG","Abdurahmansaleh Apt","MLG","Malang","ID","Indonesia"],["MDC","Sam Ratulangi Apt","MDC","Manado","ID","Indonesia"],["MKW","Manokwari Airport","MKW","Manokwari","ID","Indonesia"],["LOP","Selaparang Apt","LOP","Mataram","ID","Indonesia"],["LSW","Malikus Saleh Arpt","LSW","Lhok Seumawe","ID","Indonesia"],["KNO","Kuala Namu","MES","Medan","ID","Indonesia"],["PDG","Minangkabau Intnl Apt","PDG","Padang","ID","Indonesia"],["PKY","Tjilik Riwut Apt","PKY","Palangkaraya","ID","Indonesia"],["PLM","Sultan Badarudin Apt","PLM","Palembang","ID","Indonesia"],["PLW","Mutiara Airport","PLW","Palu","ID","Indonesia"],["PGK","Depati Amir Airport","PGK","Pangkalpinang","ID","Indonesia"],["PKU","Sultan Syarif Kasim I1 Pekanbaru","PKU","Pekan Baru","ID","Indonesia"],["PNK","Supadio Apt","PNK","Pontianak","ID","Indonesia"],["SRG","Achmad Yani Apt","SRG","Semarang","ID","Indonesia"],["SOC","Adisumarmo Intl Apt","SOC","Solo","ID","Indonesia"],["SOQ","Domine Eduard Osok Airport","SOQ","Sorong","ID","Indonesia"],["SUB","Juanda Intl Apt","SUB","Surabaya","ID","Indonesia"],["TNJ","Raja Haji Fisabilillah Intl Arpt","TNJ","Tanjung Pinang","ID","INDONESIA"],["TRK","Juwata Airport ","TRK","Tarakan","ID","Indonesia"],["TTE","Sultan Babullah Airport","TTE","Ternate","ID","Indonesia"],["TIM","Timika Apt","TIM","Timika","ID","Indonesia"],["KIX","Kansai Internasional Apt","OSA","Osaka","JP","Japan"],["NRT","Narita Internasional Apt","TYO","Tokyo","JP","Japan"],["ICN","Incheon Intnl Airport","SEL","Seoul ","KR","Korea"],["KUL","Klia Airport","KUL","Kuala Lumpur","MY","Malaysia"],["AMS","Schipol Internasional Apt","AMS","Amsterdam","NL","Netherland"],["JED","King Abdul Aziz Intl Apt","JED","Jeddah","SA","Saudi Arabia"],["SIN","Changi Airport","SIN","Singapore","SG","Singapore"],["BKK","Suvarnabhumi Intnl Apt","BKK","Bangkok","TH","Thailand"],["TPE","Chiang Kai Sek Apt","TPE","Taipei","TW","Taiwan"],["PEN","Penang International Airport","PEN","Penang Island","MY","Malaysia"],["LBJ","Komodo Airport","LBJ","Labuan Bajo","ID","Indonesia"],["BMU","Sultan M.Salahuddin  Airport","BMU","Bima","ID","Indonesia"],["ENE","H Hasan Aroeboesman Airport","ENE","Ende","ID","Indonesia"],["TMC","Waikabubak Airport","TMC","Tambolaka","ID","Indonesia"],["MKQ","Mopah Arpt","MKQ","Merauke","ID","Indonesia"],["BWX","Blimbingsari Airport","BWX","Banyuwangi","ID","Indonesia"],["JBB","Noto Hadinegoro Jember Airport","JBB","Jember","ID","Indonesia"],["FLZ","Dr Ferdinand Lumban Tobing Airport","FLZ","Sibolga","ID","Indonesia"],["CAN","Baiyun Intl Airport","CAN","Guangzhou","CN","China"],["BUW","Betoambari Airport","BUW","BAUBAU","ID","Indonesia"],["LUW","Syukuran Aminuddin Amir Airport","LUW","Luwuk","ID","Indonesia"],["MJU","Tampa Padang Airport","MJU","Mamuju","ID","Indonesia"],["PUM","Pomala Airport","PUM","Kolaka","ID","Indonesia"],["LGW","London Gatwick Airport","LON","London","GB","United Kingdom"],["LUV","Karel Satsuitubun Airport","LUV","Langgur","ID","Indonesia"],["PSU","Pangsuma Airport","PSU","Putussibau","ID","Indonesia"],["SXK","Mathilda Batlayeri Airport","SXK","Saumlaki","ID","Indonesia"],["SWQ","Brangbiji Airport","SWQ","Sumbawa","ID","Indonesia"],["DIL","Presidente Nicolau Lobato Intl Arpt","DIL","Dili","TL","Timor Leste"],["SBG","Maimun Saleh Arpt","SBG","Sabang","ID","Indonesia"]]
        
        ret_origin = ""
        ret_dest = ""
        for origin in airports:
            if kode == origin[0]:
                ret_origin = origin
                break
        
        for origin in airportsdest:
            if kode == origin[0]:
                ret_dest = origin
                #ret_dest = origin[3]+' ('+origin[2]+'), '+origin[1]+' ('+origin[0]+'), '+origin[5]

                break
            
        if direction == "origin":
            return ret_origin
        else:
            return ret_dest
    
    def setUp(self):
        self.driver = webdriver.Firefox()
        #self.driver.implicitly_wait(30)
        self.base_url = "https://gosga.garuda-indonesia.com/web/user/login/id"
        self.verificationErrors = []
        self.accept_next_alert = True
        
        cnx = mysql.connector.connect(**config)
        query = ("SELECT c.*,a.firstname,a.middlename,a.lastname,a.salutation,a.tanggallahir, a.jenispenumpang,a.idmaskapaipulang,a.idmaskapaipergi,a.kodeterbangpergi,a.kodeterbangpulang,a.rute,a.tanggalpergi,a.tanggalpulang,b.teleponpelanggan FROM travel.ticketing_detail a join ticketing b on a.idticketing = b.idticketing join agent c on b.idagent = c.idagent where a.idticketing = %s")
        cursor = cnx.cursor()
        cursor.execute(query,(idticketing,))
        self.datalist = []
        count = 0
        for (idagent,namaagen,alamat,telepon,email,parent,username,gambar,active,alamat2,alamat3,kota,firstname,middlename,lastname,salutation,tanggallahir,jenispenumpang,idmaskapaipulang,idmaskapaipergi,kodeterbangpergi,kodeterbangpulang,rute,tanggalpergi,tanggalpulang,teleponpelanggan) in cursor:
            data = dataticket.dataticket()
            data.idagent = idagent
            data.namaagen = namaagen
            data.alamat = alamat
            data.telepon = telepon
            data.email = email
            data.parent = parent
            data.username = username
            data.gambar = gambar
            data.active = active
            data.alamat2 = alamat2
            data.alamat3 = alamat3
            data.kota = kota
            data.firstname = firstname
            data.middlename = middlename
            data.lastname = lastname
            data.salutation = salutation
            data.tanggallahir = tanggallahir.isoformat()
            
            data.jenispenumpang = jenispenumpang
            data.idmaskapaipulang = idmaskapaipulang
            data.idmaskapaipergi= idmaskapaipergi
            data.kodeterbangpergi = kodeterbangpergi
            data.kodeterbangpulang = kodeterbangpulang
            data.rute = rute
            data.tanggalpergi = tanggalpergi.isoformat()
            data.tanggalpulang = tanggalpulang.isoformat()
            #print data.tanggalpergi
            if count == 0:
                #temp_pattern = self.makepattern(data)
                #self.pattern_pergi = temp_pattern[0]
                #self.pattern_pulang = temp_pattern[1]
                self.kodeterbangpergi = data.kodeterbangpergi
                self.kodeterbangpulang = data.kodeterbangpulang
                self.tanggal_awal = data.formattanggal2(data.tanggalpergi,"/")
                self.tanggal_akhir = data.formattanggal2(data.tanggalpulang,"/")
                self.origin = data.getrute(0)
                self.dest = data.getrute(1)
                #print scriptmode == 2
                if scriptmode == 2:
                    self.origin = data.getrute(1)
                    self.dest = data.getrute(0)
                    self.isoneway = True
                elif scriptmode == 1:
                    self.isoneway = False
                else:
                    self.isoneway = True
                #self.isoneway = data.idmaskapaipergi != data.idmaskapaipulang
                self.teleponpelanggan = teleponpelanggan
            self.datalist.append(data)
            count += 1
            #origin = sys.argv[4]
            #dest = sys.argv[5]
            #isoneway = sys.argv[6]
            #kodeterbang_pergi = sys.argv[7]
            #kodeterbang_pulang = sys.argv[8]
            #jam_pergi = sys.argv[9]
            #jam_pulang = sys.argv[10]
            #contactnumber = sys.argv[11]
        
        
        cursor.close()
        cnx.close()
        #print self.pattern_pergi
        #print self.pattern_pulang
        self.jumlahdewasa = 0
        self.jumlahchild = 0
        self.jumlahinfant = 0
        
        for penumpang in self.datalist :
            if penumpang.jenispenumpang == 1:
                self.jumlahdewasa += 1
            elif penumpang.jenispenumpang == 2:
                self.jumlahchild += 1
            else:
                self.jumlahinfant += 1 
    
    def test_garuda_booking(self):
        driver = self.driver
        driver.get(self.base_url)

        driver.find_element_by_name("Inputs[username]").clear()
        driver.find_element_by_name("Inputs[username]").send_keys("SA3ININ")
        driver.find_element_by_name("Inputs[password]").clear()
        driver.find_element_by_name("Inputs[password]").send_keys("58251337")
        driver.find_element_by_name("Login").click()
        driver.find_element_by_link_text("Reservasi Penerbangan").click()

       
        origindetail = self.getairport(self.origin,"origin")
        destdetail = self.getairport(self.dest,"dest")
        driver.find_element_by_id("autoOrigin").clear()
        
        driver.find_element_by_id("autoOrigin").send_keys(origindetail[3]+' ')
        driver.find_element_by_id("autoOrigin").send_keys(Keys.SHIFT + "9")
        driver.find_element_by_id("autoOrigin").send_keys(origindetail[2]+'), '+origindetail[1]+' ')
        driver.find_element_by_id("autoOrigin").send_keys(Keys.SHIFT + "9")
        driver.find_element_by_id("autoOrigin").send_keys(origindetail[0]+'), '+origindetail[5])
        
        print origindetail
        driver.execute_script("return $('#origin').val('"+self.origin+"');")
        
#        
        #time.sleep(10)
        #driver.find_element_by_class_name("ui-menu-item").click()
        driver.find_element_by_id("autoDest").clear()
        driver.find_element_by_id("autoDest").send_keys(destdetail[3]+' ')
        driver.find_element_by_id("autoDest").send_keys(Keys.SHIFT + "9")
        driver.find_element_by_id("autoDest").send_keys(destdetail[2]+'), '+destdetail[1]+' ')
        driver.find_element_by_id("autoDest").send_keys(Keys.SHIFT + "9")
        driver.find_element_by_id("autoDest").send_keys(destdetail[0]+'), '+destdetail[5])
        
        driver.execute_script("return $('#dest').val('"+self.dest+"');")
        
        
        
        
        
        if not self.isoneway:
            driver.find_element_by_id("tripTypeR").click()
        else:
            driver.find_element_by_id("tripTypeO").click()
#            
#

        driver.execute_script("return $('#outDate').val('"+self.tanggal_awal+"');")
        driver.execute_script("return $('#retDate').val('"+self.tanggal_akhir+"');")
        
        
        Select(driver.find_element_by_id("child")).select_by_visible_text(str(self.jumlahchild))
        Select(driver.find_element_by_name("Inputs[serviceClass]")).select_by_visible_text("Economy")
        
        
        driver.find_element_by_id("btnSubmit2").click()
        print self.kodeterbangpulang
        print self.kodeterbangpergi
        if scriptmode == 2:
            
            tickets = driver.find_elements_by_xpath('//*[text()="'+self.kodeterbangpulang.replace("-","") +'"]/following-sibling::td/input')
            
            if len(tickets) > 0:
                ticket = tickets[0]
                ticket.click()
        else :
            
            tickets = driver.find_elements_by_xpath('//*[text()="'+self.kodeterbangpergi.replace("-","")+'"]/following-sibling::td/input')
            
            if len(tickets) > 0:
                ticket = tickets[0]
                ticket.click()
        
        
        
        
        if scriptmode == 1:
            
            tickets = driver.find_elements_by_xpath('//*[text()="'+self.kodeterbangpulang.replace("-","")+'"]/following-sibling::td/input')
            
            if len(tickets) > 0:
                ticket = tickets[0]
                ticket.click()
        

        time.sleep(5)
        driver.find_element_by_id("btnCheckFare").click()
        time.sleep(10)
        html = driver.find_element_by_class_name("farebreakdown").get_attribute("outerHTML")
        
        pagesource = html
        
        #        file_object = open(cfg.filedestpath + "garuda_"+idticketing, "w")
        #        file_object.write(pagesource)
        #        file_object.close()
        #        print "success"
        
        driver.find_element_by_id("btnContinue").click()
        
        ##driver.find_element_by_link_text("Logout").click()
        
        
        
        dewasaindex = 1
        childindex = 1
        for data in self.datalist:
            if data.jenispenumpang == 1:
                ##driver.find_element_by_id("InputsAdt1Nameprefix").select_by_visible_text("MR")
                driver.execute_script("return $('#InputsAdt"+str(dewasaindex)+"Nameprefix').val('MR');")
                driver.find_element_by_name("Inputs[adt]["+str(dewasaindex)+"][firstname]").clear()
                driver.find_element_by_name("Inputs[adt]["+str(dewasaindex)+"][firstname]").send_keys(data.firstname)
                driver.find_element_by_name("Inputs[adt]["+str(dewasaindex)+"][middlename]").clear()
                driver.find_element_by_name("Inputs[adt]["+str(dewasaindex)+"][middlename]").send_keys(data.middlename)
                driver.find_element_by_name("Inputs[adt]["+str(dewasaindex)+"][lastname]").clear()
                driver.find_element_by_name("Inputs[adt]["+str(dewasaindex)+"][lastname]").send_keys(data.lastname)
                dewasaindex += 1
            elif data.jenispenumpang == 2:
                driver.execute_script("return $('#InputsChd"+str(childindex)+"Nameprefix').val('MSTR');")
                #Select(driver.find_element_by_id("InputsChd1Nameprefix")).select_by_visible_text("MSTR")
                driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][firstname]").clear()
                driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][firstname]").send_keys(data.firstname)
                driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][middlename]").clear()
                driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][middlename]").send_keys(data.middlename)
                driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][lastname]").clear()
                driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][lastname]").send_keys(data.lastname)
                
                tgl_lahir = dataticket.dataticket.getdatetime(data.tanggallahir)
                Select(driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][birthDD]")).select_by_visible_text(str(tgl_lahir.day))
                Select(driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][birthMM]")).select_by_visible_text(dataticket.dataticket.monthtoname(tgl_lahir.month))
                Select(driver.find_element_by_name("Inputs[chd]["+str(childindex)+"][birthYY]")).select_by_visible_text(str(tgl_lahir.year))
                childindex += 1
        
        driver.find_element_by_id("contactMobileph").clear()
        driver.find_element_by_id("contactMobileph").send_keys(self.teleponpelanggan)
                
        
        driver.find_element_by_id("btnContinue").click()
        driver.find_element_by_id("acceptTerm").click()
        
        time.sleep(20)
        driver.find_element_by_id("payTypeBA").click()
        
        driver.find_element_by_id("btnContinue").click()
      
        
        
        pagesource = html
        
        #driver.get("http://localhost/travel/index.php/scrap/sample/garudabooking")
        #kodebooking = driver.find_element_by_xpath("//pre").get_attribute("innerHTML")
        pagesource = pagesource + "<div id='kodebooking'>"+kodebooking+"</div>"
        #pagesource = u''.join((driver.page_source)).encode('utf-8')
        file_object = open(cfg.filedestpath + "garuda_"+idticketing, "w")
        #obj = file_object.read()
        file_object.write(pagesource)
        file_object.close()
        print "success"
        driver.find_element_by_link_text("Logout").click()
        
        #driver.get("http://localhost/travel/index.php/scrap/sample/garudabooking")
       
    
    def is_element_present(self, how, what):
        try: self.driver.find_element(by=how, value=what)
        except NoSuchElementException, e: return False
        return True
    
    def is_alert_present(self):
        try: self.driver.switch_to_alert()
        except NoAlertPresentException, e: return False
        return True
    
    def close_alert_and_get_its_text(self):
        try:
            alert = self.driver.switch_to_alert()
            alert_text = alert.text
            if self.accept_next_alert:
                alert.accept()
            else:
                alert.dismiss()
            return alert_text
        finally: self.accept_next_alert = True
    
    def tearDown(self):
        self.driver.quit()
        self.assertEqual([], self.verificationErrors)

if __name__ == "__main__":
    config = cfg.database
    idticketing = sys.argv[1]
    scriptmode = int(sys.argv[2])
    #tanggal_awal = sys.argv[2]
    #tanggal_akhir = sys.argv[3]
    #origin = sys.argv[4]
    #dest = sys.argv[5]
    #isoneway = sys.argv[6]
    #kodeterbang_pergi = sys.argv[7]
    #kodeterbang_pulang = sys.argv[8]
    #jam_pergi = sys.argv[9]
    #jam_pulang = sys.argv[10]
    #contactnumber = sys.argv[11]
    sys.argv = ['garuda-booking.py']
    unittest.main()
    
