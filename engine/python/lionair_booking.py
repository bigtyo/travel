# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.webdriver.support.ui import WebDriverWait
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re,sys
import mysql.connector
import cfg, dataticket
from urllib import urlretrieve
from PIL import Image


class LionairBooking(unittest.TestCase):
    def get(self,link):
        urlretrieve(link,cfg.filedestpath + idticketing + ".jpg")
    
    def getcaptchainput(self):
        cnx = mysql.connector.connect(**config)
        query = ("SELECT captcha from ticketing where idticketing = %s")
        cursor = cnx.cursor()
        cursor.execute(query,(idticketing,))
        for captcha in cursor:
            #print captcha
            self.captchainput = captcha[0]
        cursor.close()
        cnx.close()
        
        return self.captchainput
        
    
    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(10)
        self.base_url = "https://agent.lionair.co.id"
        self.verificationErrors = []
        self.accept_next_alert = True
        
        self.kodemaskapai = 1
        self.login = ""
        self.password = ""
        
        self.cred = cfg.getloginandpass(self.kodemaskapai)
        self.login = self.cred[0]
        self.password = self.cred[1]
        
        cnx = mysql.connector.connect(**config)
        query = ("SELECT c.*,a.firstname,a.middlename,a.lastname,a.salutation,a.tanggallahir, a.jenispenumpang,a.idmaskapaipulang,a.idmaskapaipergi,a.kodeterbangpergi,a.kodeterbangpulang,a.rute,a.tanggalpergi,a.tanggalpulang,b.teleponpelanggan FROM travel.ticketing_detail a join ticketing b on a.idticketing = b.idticketing join agent c on b.idagent = c.idagent where a.idticketing = %s order by a.jenispenumpang ASC")
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
        
    
    def test_lionair_booking(self):
        driver = self.driver
        driver.get(self.base_url + "/LionAirAgentsPortal/Default.aspx")
        
        driver.save_screenshot(cfg.filedestpath+ "sc_"+idticketing+".png")
        
        img = driver.find_element_by_xpath('/html/body/form/div[3]/table/tbody/tr[3]/td[2]/table/tbody/tr[7]/td/img')
        loc = img.location
        
        tempim = Image.open(cfg.filedestpath+ "sc_"+idticketing+".png")
        tempim.crop((loc['x'],loc['y'],loc['x']+120,loc['y']+50)).save(cfg.filedestpath +idticketing+".jpg")
        
       
        
        
        driver.find_element_by_id("txtLoginName").clear()
        driver.find_element_by_id("txtLoginName").send_keys(self.login)
        driver.find_element_by_id("txtPassword").clear()
        driver.find_element_by_id("txtPassword").send_keys(self.password)
        
        
        
        ischeckinginput = True        
        numberoftry = 0
        while ischeckinginput and numberoftry <= 20:
            c_input = self.getcaptchainput()
            
            if c_input is None or c_input == "":
                time.sleep(3)        
                numberoftry += 1
                
            else:
                ischeckinginput = False
            
            
            print numberoftry
        
        
        if self.captchainput is None or self.captchainput == "":
            return
        
        
        driver.find_element_by_id("CodeNumberTextBox").clear()
        driver.find_element_by_id("CodeNumberTextBox").send_keys(self.captchainput)
        
       
        driver.find_element_by_id("imgLogin").click()
        
        
        try:
            #create booking
            driver.find_element_by_link_text(u"• Create Booking").click()
            #driver.find_element_by_xpath("/html/body/form/div[3]/table/tbody/tr[3]/td[2]/table/tbody/tr[6]/td/a").click()
            
            driver.find_element_by_id("UcFlightSelection_txtOri").clear()
            driver.find_element_by_id("UcFlightSelection_txtOri").send_keys(self.origin)
            
            driver.find_element_by_id("from"+self.origin).click()
            driver.find_element_by_id("UcFlightSelection_txtDes").clear()
            driver.find_element_by_id("UcFlightSelection_txtDes").send_keys(self.dest)
            driver.find_element_by_id("to"+self.dest).click()
            
            d_pergi = dataticket.dataticket.getdatetime(self.datalist[0].tanggalpergi)
            d_return = dataticket.dataticket.getdatetime(self.datalist[0].tanggalpulang)
            
            
            month = dataticket.dataticket.monthtoname(d_pergi.month) + " " + str(d_pergi.year)
            
            
            Select(driver.find_element_by_id("UcFlightSelection_ddlDepMonth")).select_by_value(month)
            Select(driver.find_element_by_id("UcFlightSelection_ddlDepDay")).select_by_value(str(d_pergi.day))
            
            
            if self.isoneway :
                driver.find_element_by_id("UcFlightSelection_rbOneWay").click()
            else :
                driver.find_element_by_id("UcFlightSelection_rbReturn").click()
                month = dataticket.dataticket.monthtoname(d_return.month) + " " + str(d_return.year)
            
            
                Select(driver.find_element_by_id("UcFlightSelection_ddlRetMonth")).select_by_value(month)
                Select(driver.find_element_by_id("UcFlightSelection_ddlRetDay")).select_by_value(str(d_return.day))
            
            
            
            
            
            
            Select(driver.find_element_by_id("UcFlightSelection_ddlADTCount")).select_by_visible_text(str(self.jumlahdewasa))
            
            Select(driver.find_element_by_id("UcFlightSelection_ddlCNNCount")).select_by_visible_text(str(self.jumlahchild))
            Select(driver.find_element_by_id("UcFlightSelection_ddlINFCount")).select_by_visible_text(str(self.jumlahinfant))
            driver.find_element_by_css_selector("img[alt=\"Search\"]").click()
            
            
            
            if scriptmode == 2:
                    
                tickets = driver.find_elements_by_xpath('//*[text()="'+self.kodeterbangpulang.replace("-"," ")+'"]/ancestor::td/following-sibling::td/span/input[not(@disabled) and not(@type="hidden")]')
                
                if len(tickets) > 0:
                    ticket = tickets[len(tickets) - 1]
                    ticket.click()
                    
#                    latestindex = 1
#                    isfound = False
#                    while not isfound:
#                        ticket = tickets[len(tickets) - latestindex]
#                        if ticket.is_enabled():
#                            ticket.click()
#                            isfound = True
#                        else:
#                            latestindex += 1
            else :
                
                tickets = driver.find_elements_by_xpath('//*[text()="'+self.kodeterbangpergi.replace("-"," ")+'"]/ancestor::td/following-sibling::td/span/input[not(@disabled) and not(@type="hidden")]')
                print '//*[text()="'+self.kodeterbangpergi.replace("-"," ")+'"]/ancestor::td/following-sibling::td/span/input[not(@disabled)]'
                
                if len(tickets) > 0:
                    ticket = tickets[len(tickets) - 1]
                    
                    ticket.click()
                    

            
            
            
            
            if scriptmode == 1:
                
                tickets = driver.find_elements_by_xpath('//*[text()="'+self.kodeterbangpulang.replace("-"," ")+'"]/ancestor::td/following-sibling::td/span/input[not(@disabled) and not(@type="hidden")]')
                print '//*[text()="'+self.kodeterbangpulang.replace("-"," ")+'"]/ancestor::td/following-sibling::td/span/input[not(@disabled)]'
                
                if len(tickets) > 0:
                    ticket = tickets[len(tickets) - 1]
                    
                    ticket.click()
                     
            
            try:
                print "about to look for element"
                def find(driver):
                    e = driver.find_element_by_xpath('//*[@id="Insurance_rblInsurance_1"]')
                    if (e.get_attribute("disabled")=='true'):
                        return False
                    return e
                element = WebDriverWait(driver, 10).until(find)
                print "still looking?"
            finally: 
                driver.find_element_by_xpath('//*[@id="Insurance_rblInsurance_1"]').click()
                driver.find_element_by_xpath('//*[@id="lbContinue"]').click()
                
                indexpenumpang = 1
            
                for data in self.datalist:
                    driver.find_element_by_id("NameBlock"+str(indexpenumpang)+"_txtFirstName").clear()
                    driver.find_element_by_id("NameBlock"+str(indexpenumpang)+"_txtFirstName").send_keys(data.firstname)
                    driver.find_element_by_id("NameBlock"+str(indexpenumpang)+"_txtLastName").clear()
                    driver.find_element_by_id("NameBlock"+str(indexpenumpang)+"_txtLastName").send_keys(data.lastname)
                    
                    if data.jenispenumpang > 1:
                        d = dataticket.dataticket.getdatetime(data.tanggallahir)
                        
                        Select(driver.find_element_by_id("NameBlock"+str(indexpenumpang)+"_ddlDOBDay")).select_by_value(data.formatdigit(d.day))
                        try :
                            Select(driver.find_element_by_id("NameBlock"+str(indexpenumpang)+"_ddlDOBMonth")).select_by_visible_text(dataticket.dataticket.monthtoname(d.month))
                        except:
                            try:                            
                                Select(driver.find_element_by_id("NameBlock"+str(indexpenumpang)+"_ddlDOBMonth")).select_by_visible_text(dataticket.dataticket.monthtoname2(d.month))
                            except:
                                self.logout(driver)
                        finally:
                            Select(driver.find_element_by_id("NameBlock"+str(indexpenumpang)+"_ddlDOBYear")).select_by_value(str(d.year))
                     
                    indexpenumpang += 1
                
                
                
                driver.find_element_by_id("txtCountryCode1").clear()
                driver.find_element_by_id("txtCountryCode1").send_keys("62")
                driver.find_element_by_id("txtAreaCode1").clear()
                phonearea = self.teleponpelanggan[1: (0 - (len(self.teleponpelanggan) - 4))]
                
                
                
                
                driver.find_element_by_id("txtAreaCode1").send_keys(phonearea)
                
                
                driver.find_element_by_id("txtPhoneNumber1").clear()
                mainphone = self.teleponpelanggan[4 : len(self.teleponpelanggan)]
                driver.find_element_by_id("txtPhoneNumber1").send_keys(mainphone)
                Select(driver.find_element_by_id("ddlOriNumber")).select_by_visible_text("Mobile")
                driver.find_element_by_id("txtEmailAddress1").clear()
                driver.find_element_by_id("txtEmailAddress1").send_keys(data.email)
                driver.find_element_by_id("txtEmailAddress2").clear()
                driver.find_element_by_id("txtEmailAddress2").send_keys(data.email)
                driver.find_element_by_id("chkSpecialOffers").click()
                driver.find_element_by_id("AcceptFareConditions").click()
                
                try:
                    driver.find_element_by_id("rbPay_HOLD").click()
                except:
                    print "booking login only"
                finally:
                    driver.find_element_by_css_selector("img[alt=\"Continue\"]").click()
                    nta = 0
                    try:
                        alert = self.driver.switch_to_alert()
                        alert_text = alert.text
                        alert_text = alert_text.replace("NTA", "")
                        alert_text = alert_text.replace("IDR","")
                        alert_text = alert_text.replace(" ","")
                        alert_text = alert_text.replace("=","")
                        alert_text = alert_text.replace(",","")
                        nta = str(alert_text)
                        
                        if self.accept_next_alert:
                            alert.accept()
                        else:
                            alert.dismiss()
                        print alert_text
                    finally: self.accept_next_alert = True
                    html_page = u''.join((driver.find_element_by_id("main-content").get_attribute('outerHTML'))).encode('utf-8').strip()        
                    html_page += "<div id='ntaid'>"+str(nta)+"</div>"
                    file_object = open(cfg.filedestpath + "lionair_"+idticketing, "w")
                    #obj = file_object.read()
                    file_object.write(html_page)
                    file_object.close()
                    time.sleep(20)
                    self.logout(driver)
                    
                
                
                
                
                
            
            
            
            

            
            
            
            
            
            
            #logout        
            
        except Exception as error:
            print "error detail :", error
            self.logout(driver)
            return
        
        
        
       
        
        
    
    def is_element_present(self, how, what):
        try: self.driver.find_element(by=how, value=what)
        except NoSuchElementException, e: return False
        return True
    
    def logout(self,driver):
        #logout        
        try:
            #driver.find_element_by_link_text(u"• Log Out").click()
            #driver.find_element_by_xpath("/html/body/form/div[3]/table/tbody/tr[3]/td[2]/table/tbody/tr[17]/td/a").click()
            driver.find_element_by_xpath(".//*[@id='ctl00_tblMenu']/tbody/tr[8]/td/a").click()
            #driver.find_
            #/html/body/form/div[3]/table/tbody/tr[3]/td[2]/table/tbody/tr[8]/td/a
        except:
            driver.back()
            #driver.find_element_by_link_text(u"• Log Out").click()
            #driver.find_element_by_xpath("/html/body/form/div[3]/table/tbody/tr[3]/td[2]/table/tbody/tr[17]/td/a").click()
            driver.find_element_by_xpath(".//*[@id='ctl00_tblMenu']/tbody/tr[8]/td/a").click()
    
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
    sys.argv = ['lionair_booking.py']
    unittest.main()
