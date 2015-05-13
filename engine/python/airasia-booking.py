# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re, sys
import mysql.connector
import cfg, dataticket

class Airasia(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(30)
        self.base_url = "https://booking.airasia.com/LoginAgent.aspx"
        self.verificationErrors = []
        self.accept_next_alert = True
        
        self.kodemaskapai = 10
        self.login = ""
        self.password = ""
        
        self.cred = cfg.getloginandpass(self.kodemaskapai)
        self.login = self.cred[0]
        self.password = self.cred[1]
        
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
                
                self.tanggal_awal = data.formattanggal(data.tanggalpergi,"/",False,False)
                self.tanggal_akhir = data.formattanggal(data.tanggalpulang,"/",False,False)
                
                self.origin = data.getrute(0)
                self.dest = data.getrute(1)
                
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
        
    def makepattern(self,data):
        #val = "QZ~7620~ ~~SUB~02/06/2015 17:20~DPS~02/06/2015 19:10~@02/6/2015 10:20:00"
        temp_pattern_pergi = re.split("-",data.kodeterbangpergi)[0]+"~ "+re.split("-",data.kodeterbangpergi)[1]+"~ "
        temp_pattern_pergi = r''+temp_pattern_pergi + "~~"+re.split("-",data.rute)[0]+"~"+data.formattanggal(data.tanggalpergi,"/",True,True) +"~"
        #print temp_pattern_pergi
        
        temp_pattern_pulang = re.split("-",data.kodeterbangpulang)[0]+"~ "+re.split("-",data.kodeterbangpulang)[1]+"~ "
        temp_pattern_pulang = r''+ temp_pattern_pulang + "~~"+re.split("-",data.rute)[1]+"~"+data.formattanggal(data.tanggalpergi,"/",True,True) +"~"
        
        return [temp_pattern_pergi,temp_pattern_pulang]
    
    def test_airasia(self):
        driver = self.driver
        driver.get(self.base_url)
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_TextBoxUserID").clear()
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_TextBoxUserID").send_keys(self.login)
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_PasswordFieldPassword").clear()
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_PasswordFieldPassword").send_keys(self.password)
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_LinkButtonLogIn").click()
        driver.find_element_by_css_selector("div.AgentMenuDiv").click()
        driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchVieworiginStationMultiColumn1_1").click()
        driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchVieworiginStationMultiColumn1_1").clear()

        #time.sleep(30)        

        #return        
        
        driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchVieworiginStationMultiColumn1_1").send_keys(self.origin)
        
        driver.find_element_by_xpath("//*[@data-value='"+self.origin+"']").click()
        #time.sleep(20)
        
        
        
        #driver.find_element_by_link_text("Surabaya (SUB)").click()
        driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchViewdestinationStationMultiColumn1_1").clear()
        driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchViewdestinationStationMultiColumn1_1").send_keys(self.dest)
        driver.find_element_by_xpath("//*[@data-value='"+self.dest+"']").click()
        #driver.find_element_by_link_text("Jakarta (CGK)").click()
        
        driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchViewdate_picker_display_id_1").clear()
        
        if scriptmode == 2:
            driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchViewdate_picker_display_id_1").send_keys(self.tanggal_akhir)
        else:
            driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchViewdate_picker_display_id_1").send_keys(self.tanggal_awal)
        
        print self.isoneway
        if self.isoneway:
            driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchView_OneWay").click()
        else:
            driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchViewdate_picker_display_id_2").clear()
            driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchViewdate_picker_display_id_2").send_keys(self.tanggal_akhir)
        
        #print self.jumlahchild
        #print self.jumlahinfant
        #"ControlGroupSearchView_AvailabilitySearchInputSearchView_DropDownListPassengerType_ADT"
        
        if self.jumlahdewasa > 1 or self.jumlahdewasa == 0:
            Select(driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchView_DropDownListPassengerType_ADT")).select_by_visible_text(str(self.jumlahdewasa) + " Adults")
        else:
            Select(driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchView_DropDownListPassengerType_ADT")).select_by_visible_text(str(self.jumlahdewasa) + " Adult")
        
        if self.jumlahchild > 1 or self.jumlahchild == 0:
            Select(driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchView_DropDownListPassengerType_CHD")).select_by_visible_text(str(self.jumlahchild) + " Kids")
        else:
            Select(driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchView_DropDownListPassengerType_CHD")).select_by_visible_text(str(self.jumlahchild) + " Kid")
        
        if self.jumlahinfant > 1 or self.jumlahinfant == 0:
            Select(driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchView_DropDownListPassengerType_INFANT")).select_by_visible_text(str(self.jumlahinfant) + " Infants")
        else:
            Select(driver.find_element_by_id("ControlGroupSearchView_AvailabilitySearchInputSearchView_DropDownListPassengerType_INFANT")).select_by_visible_text(str(self.jumlahinfant) + " Infant")
        
        #time.sleep(50)
        driver.find_element_by_id("ControlGroupSearchView_ButtonSubmit").click()
        
        #ticketlist = "ControlGroupSelectView$AvailabilityInputSelectView$market1"
        
        
        list_ticket = driver.find_elements_by_name("ControlGroupSelectView$AvailabilityInputSelectView$market1")
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
        
        
        if not self.isoneway:
            list_ticket = driver.find_elements_by_name("ControlGroupSelectView$AvailabilityInputSelectView$market1")
            ticket_value = ""
            count = 0
            for ticket in list_ticket:
                
                tempticket_value = ticket.get_attribute('value')
                
                regexp = re.compile(self.pattern_pergi)
                
                if regexp.search(tempticket_value) is not None:
                    count += 1
                    #print count
                    #print ticket_value
                    ticket_value = tempticket_value
                    break
        
        #time.sleep(10)
        
        driver.find_element_by_id("ControlGroupSelectView_ButtonSubmit").click()
        #driver.page_source()
        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_DropDownListHomePhoneIDC")).select_by_visible_text("Indonesia(+62)")
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_TextBoxHomePhone").clear()
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_TextBoxHomePhone").send_keys(self.datalist[0].telepon)
        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_DropDownListOtherPhoneIDC")).select_by_visible_text("Indonesia(+62)")
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_TextBoxOtherPhone").clear()
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_TextBoxOtherPhone").send_keys(self.datalist[0].telepon)
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_EmergencyTextBoxGivenName").clear()
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_EmergencyTextBoxGivenName").send_keys(self.datalist[0].firstname)
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_EmergencyTextBoxSurname").clear()
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_EmergencyTextBoxSurname").send_keys(self.datalist[0].lastname)
        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_DropDownListMobileNo")).select_by_visible_text("Indonesia(+62)")
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_EmergencyTextBoxMobileNo").clear()
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ContactInputTravelerView_EmergencyTextBoxMobileNo").send_keys(self.teleponpelanggan)
        
        passcount = 1
        for data in self.datalist:
            tanggallahirdt = dataticket.dataticket.getdatetime(data.tanggallahir)
            if data.jenispenumpang == 1:
                driver.find_element_by_id("link_"+str(passcount)).click()
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxFirstName_0").clear()
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxFirstName_0").send_keys("Raditya")
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxLastName_0").clear()
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxLastName_0").send_keys("Pratama")
                #driver.find_element_by_id("ControlGroupSearchView_ButtonSubmit").click()
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListNationality_0")).select_by_visible_text("Indonesia")
                driver.find_element_by_css_selector("option[value=\"ID\"]").click()
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateDay_0")).select_by_visible_text(str(tanggallahirdt.day))
                driver.find_element_by_css_selector("option[value=\""+str(tanggallahirdt.day)+"\"]").click()
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateMonth_0")).select_by_visible_text(dataticket.dataticket.monthtoname(tanggallahirdt.month))
                driver.find_element_by_css_selector("#CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateMonth_0 > option[value=\""+str(tanggallahirdt.month)+"\"]").click()
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_0").click()
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_0")).select_by_visible_text(str(tanggallahirdt.year))
                driver.find_element_by_css_selector("option[value=\""+str(tanggallahirdt.year)+"\"]").click()
                
            elif data.jenispenumpang == 2:
                driver.find_element_by_id("link_"+str(passcount)).click()
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListGender_1")).select_by_visible_text("Male")
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxFirstName_1").clear()
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxFirstName_1").send_keys("Rasya")
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxLastName_1").clear()
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxLastName_1").send_keys("Atsaqof")
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListNationality_1")).select_by_visible_text("Indonesia")
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateDay_1")).select_by_visible_text(str(tanggallahirdt.day))
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateMonth_1")).select_by_visible_text(dataticket.dataticket.monthtoname(tanggallahirdt.month))
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_1")).select_by_visible_text(str(tanggallahirdt.year))
                driver.find_element_by_css_selector("#CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_1 > option[value=\""+str(tanggallahirdt.year)+"\"]").click()
                #Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_1")).select_by_visible_text("2011")
                #driver.find_element_by_css_selector("#CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_1 > option[value=\"2011\"]").click()
                
                #driver.find_element_by_id("allWrap").click()
            else:
                driver.find_element_by_id("link_"+str(passcount)).click()
                #time.sleep(50)
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListGender_0_0")).select_by_visible_text("Male")
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxFirstName_0_0").clear()
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxFirstName_0_0").send_keys("Aluna")
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxLastName_0_0").clear()
                driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxLastName_0_0").send_keys("Aisyah")
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListNationality_0_0")).select_by_visible_text("Indonesia")
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateDay_0_0")).select_by_visible_text(str(tanggallahirdt.day))
                #driver.find_element_by_css_selector("#CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateDay_0_0 > option[value=\""+str(tanggallahirdt.day)+"\"]").click()
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateMonth_0_0")).select_by_visible_text(dataticket.dataticket.monthtoname(tanggallahirdt.month))
                Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_0_0")).select_by_visible_text(str(tanggallahirdt.year))
                #driver.find_element_by_css_selector("#CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_0_0 > option[value=\""+str(tanggallahirdt.year)+"\"]").click()
                driver.find_element_by_id("mainTraveler").click()
                driver.find_element_by_id("radioButton").click()
            passcount += 1
            #time.sleep(5)

#        driver.find_element_by_css_selector("span.label").click()
#        driver.find_element_by_link_text("I am done").click()
#        driver.find_element_by_id("link_2").click()
#        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListGender_1")).select_by_visible_text("Male")
#        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxFirstName_1").clear()
#        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxFirstName_1").send_keys("Rasya")
#        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxLastName_1").clear()
#        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_TextBoxLastName_1").send_keys("Atsaqof")
#        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListNationality_1")).select_by_visible_text("Indonesia")
#        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateDay_1")).select_by_visible_text("24")
#        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateMonth_1")).select_by_visible_text("Apr")
#        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_1")).select_by_visible_text("1985")
#        driver.find_element_by_css_selector("#CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_1 > option[value=\"1985\"]").click()
#        Select(driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_1")).select_by_visible_text("2011")
#        driver.find_element_by_css_selector("#CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_PassengerInputTravelerView_DropDownListBirthDateYear_1 > option[value=\"2011\"]").click()
#        driver.find_element_by_id("link_3").click()
#        driver.find_element_by_id("allWrap").click()

        
        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_LinkButtonSkipToSeatMap").click()
#asuransi
#        driver.find_element_by_id("CONTROLGROUP_InsuranceInputControlAddOnsViewAjax_CheckBoxInsuranceAccept").click()
#        driver.find_element_by_xpath("(//input[@id='radioButton'])[2]").click()
#        driver.find_element_by_xpath("(//button[@type='button'])[3]").click()
         
#         driver.find_element_by_id("ControlGroupUnitMapView_UnitMapViewControl_LinkButtonAssignUnit").click()
#        driver.find_element_by_id("CONTROLGROUP_OUTERTRAVELER_CONTROLGROUPTRAVELER_ButtonSubmit").click()
#        driver.find_element_by_id("CONTROLGROUPADDONSFLIGHTVIEW_ButtonSubmit").click()
        driver.find_element_by_id("ControlGroupUnitMapView_UnitMapViewControl_LinkButtonAssignUnit").click()
        driver.find_element_by_id("HOLD").click()
        driver.find_element_by_id("PriceDisplayPaymentView_CheckBoxTermAndConditionConfirm").click()
        driver.find_element_by_id("ButtonSubmitProxy").click()
#        driver.find_element_by_id("CONTROLGROUPPAYMENTBOTTOM_ButtonSubmit").click()
        tables = driver.find_elements_by_class_name("RadGrid_AirAsiaBooking2")
        
        pagesource = tables[3].get_attribute("innerHTML")
        bookingid = driver.find_element_by_id("OptionalHeaderContent_lblBookingNumber").get_attribute("innerHTML")
        pagesource = pagesource + "<div id='OptionalHeaderContent_lblBookingNumber'>" + bookingid + "</div>"
        
        f= open(cfg.filedestpath+ "airasia_" + idticketing,"w")
        f.write(pagesource)
        f.close()
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

if __name__ == "__main__":
    config = cfg.database
    idticketing = sys.argv[1]
    scriptmode = int(sys.argv[2])
    
    sys.argv = ['airasia.py']
    unittest.main()
