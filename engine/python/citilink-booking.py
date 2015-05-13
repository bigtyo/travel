# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re
import mysql.connector
import sys
import json
import datetime
import cfg
import dataticket



        
    
class CitilinkBooking(unittest.TestCase):
    def setUp(self):
        #print testprint
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(30)
        self.base_url = "https://book.citilink.co.id/loginagency.aspx"
        self.verificationErrors = []
        self.accept_next_alert = True
        
        
        self.kodemaskapai = 3
        self.login = ""
        self.password = ""
        
        self.cred = cfg.getloginandpass(self.kodemaskapai)
        self.login = self.cred[0]
        self.password = self.cred[1]
        #print self.login
        #print self.password
        #self.idticketing = sys.argv.pop(0)
        #self.tanggal_awal = sys.argv.pop(1)
        #self.tanggal_akhir = sys.argv.pop(2)
        #self.origin = sys.argv.pop(3)
        #self.dest = sys.argv.pop(4)
        #self.isoneway = sys.argv.pop(5)
        #self.kodeterbang_pergi = sys.argv.pop(6)
        #self.kodeterbang_pulang = sys.argv.pop(7)
        #self.jam_pergi = sys.argv.pop(8)
        #self.jam_pulang = sys.argv.pop(9)
        #self.contactnumber = sys.argv(11)
        #self.passengers = json.loads(sys.argv(10))
        
        #for penumpang in self.passengers :
        #    if penumpang.jenispenumpang == 1:
        #        self.jumlahdewasa += 1
        #    elif penumpang.jenispenumpang == 2:
        #        self.jumlahchild += 1
        #    else:
        #        self.jumlahinfant += 1
        
        
        
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
                temp_pattern = self.makepattern(data)
                self.pattern_pergi = temp_pattern[0]
                self.pattern_pulang = temp_pattern[1]
                
                self.tanggal_awal = data.formattanggal(data.tanggalpergi,"-",False,True)
                self.tanggal_akhir = data.formattanggal(data.tanggalpulang,"-",False,True)
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
                
                #print self.isoneway
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
    
    def makepattern(self,data):
        temp_pattern_pergi = re.split("-",data.kodeterbangpergi)[0]+"~ "+re.split("-",data.kodeterbangpergi)[1]+"~ "
        temp_pattern_pergi = r''+temp_pattern_pergi + "~~"+re.split("-",data.rute)[0]+"~"+data.formattanggal(data.tanggalpergi,"/",True,True) +"~"
        #print temp_pattern_pergi
        
        temp_pattern_pulang = re.split("-",data.kodeterbangpulang)[0]+"~ "+re.split("-",data.kodeterbangpulang)[1]+"~ "
        temp_pattern_pulang = r''+ temp_pattern_pulang + "~~"+re.split("-",data.rute)[1]+"~"+data.formattanggal(data.tanggalpulang,"/",True,True) +"~"
        
        return [temp_pattern_pergi,temp_pattern_pulang]
    
    def test_citilink_booking(self):
        driver = self.driver
        
        
        temp_tgl_a = self.tanggal_awal.split("-")
        tgl_a_tgl = temp_tgl_a[1]
        tgl_a_bln = temp_tgl_a[2] + "-" + temp_tgl_a[0]
        #print tgl_a_bln
        #print tgl_a_tgl
        temp_tgl_b = self.tanggal_akhir.split("-")
        tgl_b_tgl = temp_tgl_b[1]
        tgl_b_bln = temp_tgl_b[2] + "-" + temp_tgl_b[0]
        #return
        driver.get(self.base_url)
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_TextBoxUserID").clear()
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_TextBoxUserID").send_keys(sef.login)
        
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_PasswordFieldPassword").clear()
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_PasswordFieldPassword").send_keys(self.password)
        
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_ButtonLogIn").click()
        
        
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListVieworiginStation1")).select_by_value(self.origin)
        
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListViewdestinationStation1")).select_by_value(self.dest)
        #print self.isoneway
        if self.isoneway == True :
            driver.find_element_by_id("AvailabilitySearchInputBookingListView_OneWay").click()
        else:
            driver.find_element_by_id("AvailabilitySearchInputBookingListView_RoundTrip").click()
        #time.sleep(5)
            
        if scriptmode == 2 :
            Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListMarketMonth1")).select_by_value(tgl_b_bln)
            Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListMarketDay1")).select_by_value(tgl_b_tgl)
        else:
            Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListMarketMonth1")).select_by_value(tgl_a_bln)
            Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListMarketDay1")).select_by_value(tgl_a_tgl)
                
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        if not self.isoneway:
            Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListMarketMonth2")).select_by_value(tgl_b_bln)
            Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListMarketDay2")).select_by_value(tgl_b_tgl)
        
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListPassengerType_ADT")).select_by_value(str(self.jumlahdewasa))
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListPassengerType_CHD")).select_by_value(str(self.jumlahchild))
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListPassengerType_INFANT")).select_by_value(str(self.jumlahinfant))
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("AvailabilitySearchInputBookingListView_ButtonSubmit").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        
        #pilih tiket pergi disini
        #driver.find_element_by_id("ControlGroupScheduleSelectView_AvailabilityInputScheduleSelectView_RadioButtonMkt1Fare4").click()
        #ticketvalue = "631~"
        #driver.find_element_by_css_selector("input[name='ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market1'][value~='"+ticketvalue+"']")
        #listpilihanpergi = driver.find_elements_by_name("ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market1")
        #for radio in listpilihanpergi:
        
        #pilih tiket pulang disini
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        #ticketvalue = ""
        list_ticket = driver.find_elements_by_name("ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market1")
        ticket_value = ""
        count = 0
        for ticket in list_ticket:
            
            tempticket_value = ticket.get_attribute('value')
            
            if scriptmode == 2:
                regexp = re.compile(self.pattern_pulang)
            else:
                regexp = re.compile(self.pattern_pergi)
            
            if regexp.search(tempticket_value) is not None:
                count += 1
                #print count
                #print ticket_value
                ticket_value = tempticket_value
                break
                
            
        #print ticket_value    
        driver.find_element_by_xpath("//input[@name='ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market1'][@value='"+ticket_value+"']").click()
        #driver.find_element_by_css_selector("input[name='ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market1'][value='"+ticket_value+"']")
        
        #list_ticket = driver.find_elements_by_name("ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market2")
        #ticket_value = ""
        #for ticket in list_ticket:
        #    ticket_value = ticket.get_attribute('value')
        #    print ticket_value
        #    if self.findmatch(ticket_value,0):
        #        continue
        #print ticket_value
        #driver.find_element_by_css_selector("input[name='ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market2'][value='"+ticket_value+"']")
        #driver.find_element_by_id("ControlGroupScheduleSelectView_AvailabilityInputScheduleSelectView_RadioButtonMkt2Fare4").click()
        #print self.pattern_pulang
        if not self.isoneway:
            list_ticket = driver.find_elements_by_name("ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market2")
            ticket_value = ""
            count = 0
            for ticket in list_ticket:
                
                tempticket_value = ticket.get_attribute('value')
                
                regexp = re.compile(self.pattern_pulang)
                
                if regexp.search(tempticket_value) is not None:
                    count += 1
                    #print count
                    #print ticket_value
                    ticket_value = tempticket_value
                    break
                    
                
            #print ticket_value    
            driver.find_element_by_xpath("//input[@name='ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market2'][@value='"+ticket_value+"']").click()
        
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("ControlGroupScheduleSelectView_ButtonSubmit").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        if len(self.datalist) > 0:
            driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxFirstName").clear()
            driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxFirstName").send_keys(self.datalist[0].namaagen)
            # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
            driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxMiddleName").clear()
            driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxMiddleName").send_keys("A")
            # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
            driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxLastName").clear()
            driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxLastName").send_keys(self.datalist[0].namaagen)
            
            driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxHomePhone").clear()
            driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxHomePhone").send_keys(self.teleponpelanggan)
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        childindex = 0
        normalindex = 0
        adultindex = 0
        infantindex = 0
        for passenger in self.datalist:
            if passenger.jenispenumpang == 1:
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_"+str(normalindex)).clear()
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_"+str(normalindex)).send_keys(passenger.firstname)
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_"+str(normalindex)).clear()
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_"+str(normalindex)).send_keys(passenger.lastname)
                adultindex += 1
                normalindex += 1
            if passenger.jenispenumpang == 2:
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_"+str(normalindex)).clear()
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_"+str(normalindex)).send_keys(passenger.firstname)
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_"+str(normalindex)).clear()
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_"+str(normalindex)).send_keys(passenger.lastname)
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateDay_"+str(normalindex))).select_by_visible_text("24")
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateMonth_"+str(normalindex))).select_by_visible_text("Apr")
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateYear_"+str(normalindex))).select_by_visible_text("2011")
                normalindex += 1
                childindex += 1
            if passenger.jenispenumpang == 3:
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_"+str(infantindex)+"_"+str(infantindex)).clear()
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_"+str(infantindex)+"_"+str(infantindex)).send_keys(passenger.firstname)
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_"+str(infantindex)+"_"+str(infantindex)).clear()
                driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_"+str(infantindex)+"_"+str(infantindex)).send_keys(passenger.lastname)
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListGender_"+str(infantindex)+"_"+str(infantindex))).select_by_visible_text("Female")
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateDay_"+str(infantindex)+"_"+str(infantindex))).select_by_visible_text("1")
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateMonth_"+str(infantindex)+"_"+str(infantindex))).select_by_visible_text("Jan")
                # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
                Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateYear_"+str(infantindex)+"_"+str(infantindex))).select_by_visible_text("2014")
                
                infantindex += 1

        
        
        
        
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_RadioButtonInsurance_1").click()
       
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ButtonSubmit").click()

        driver.find_element_by_id("ControlGroupUnitMapView_UnitMapViewControl_LinkButtonAssignUnit").click()
   
        time.sleep(10)
        driver.find_element_by_id("HOLD_tab").click()
        
        
       
        driver.find_element_by_id("CONTROLGROUPPAYMENTBOTTOM_ControlGroupPaymentInputViewPaymentView_AgreementPaymentInputViewPaymentView_CheckBoxAgreement").click()
      
        driver.find_element_by_id("CONTROLGROUPPAYMENTBOTTOM_ButtonSubmit").click()

        pagesource = driver.find_element_by_id("priceDisplayBody").get_attribute("innerHTML")
        pagesource = pagesource + "<span>Kode Booking</span><div id='kodebooking'>" + driver.find_element_by_id("SpanRecordLocator").get_attribute("innerHTML") + "</div>"
        file_object = open(cfg.filedestpath + "citilink_"+idticketing, "w")
        file_object.write(pagesource)
        file_object.close()
        print "success"
    
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
    
    
    
    def findmatch(self,pattern,string1):
        
            
        #if pergiorpulang == 1:
        regexp = re.compile(pattern)
        #else:
        #regexp = re.compile(temp_pattern_pergi)
        #found = 0
        if regexp.search(string1) is not None:
            return True
        else:
            return False
          
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
    sys.argv = ['citilink-booking.py']
    unittest.main()
    
