# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re
import cfg

class CitilinkIssued(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(30)
        self.base_url = "https://book.citilink.co.id/"
        self.verificationErrors = []
        self.accept_next_alert = True
        
        self.kodemaskapai = 3
        self.credentials = cfg.getloginandpass(self.kodemaskapai)
        
    
    def test_citilink_issued(self):
        driver = self.driver
        driver.get(self.base_url + "loginagency.aspx")
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_TextBoxUserID").clear()
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_TextBoxUserID").send_keys(self.credentials[0])
        
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_PasswordFieldPassword").clear()
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_PasswordFieldPassword").send_keys(self.credentials[1])
        
        
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_ButtonLogIn").click()
        
        driver.find_element_by_id("ControlGroupBookingListView_BookingListBookingListView_RadioForAgency").click()
        Select(driver.find_element_by_id("ControlGroupBookingListView_BookingListBookingListView_DropDownListTypeOfSearch")).select_by_visible_text("Confirmation number")
        driver.find_element_by_id("ControlGroupBookingListView_BookingListBookingListView_TextBoxKeyword").clear()
        driver.find_element_by_id("ControlGroupBookingListView_BookingListBookingListView_TextBoxKeyword").send_keys(kodebooking)
        driver.find_element_by_id("ControlGroupBookingListView_BookingListBookingListView_LinkButtonFindBooking").click()
        driver.find_element_by_id("HyperLinkPayment1").click()
        driver.find_element_by_id("AgencyAccount_tab").click()
        driver.find_element_by_id("CONTROLGROUPPAYMENTBOTTOM_ControlGroupPaymentInputViewPaymentView_AgreementPaymentInputViewPaymentView_CheckBoxAgreement").click()
        driver.find_element_by_id("CONTROLGROUPPAYMENTBOTTOM_ButtonSubmit").click()
        
        print 1
    
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
    kodebooking = sys.argv[1]
    unittest.main()
    
