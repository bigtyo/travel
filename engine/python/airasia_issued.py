# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re, sys
import cfg

class AirasiaIssued(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
        #self.driver.implicitly_wait(30)
        self.base_url = "https://booking.airasia.com/LoginAgent.aspx"
        self.verificationErrors = []
        self.accept_next_alert = True
        
        self.kodemaskapai = 3
        self.login = ""
        self.password = ""
        
        self.cred = cfg.getloginandpass(self.kodemaskapai)
        self.login = self.cred[0]
        self.password = self.cred[1]
    
    def test_airasia_issued(self):
        driver = self.driver
        driver.get(self.base_url + "/LoginAgent.aspx")
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_TextBoxUserID").clear()
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_TextBoxUserID").send_keys(self.login)
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_PasswordFieldPassword").clear()
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_PasswordFieldPassword").send_keys(self.password)
        driver.find_element_by_id("ControlGroupLoginAgentView_AgentLoginView_LinkButtonLogIn").click()
        driver.find_element_by_css_selector("#MyBookings > div.AgentMenuDiv").click()
        driver.find_element_by_id("ControlGroupBookingListView_BookingListSearchInputView_RadioForAgency").click()
        Select(driver.find_element_by_id("ControlGroupBookingListView_BookingListSearchInputView_DropDownListTypeOfSearch")).select_by_visible_text("RecordLocator")
        driver.find_element_by_id("ControlGroupBookingListView_BookingListSearchInputView_TextBoxKeyword").clear()
        driver.find_element_by_id("ControlGroupBookingListView_BookingListSearchInputView_TextBoxKeyword").send_keys(kodebooking)
        driver.find_element_by_css_selector("img[alt=\"Find Booking\"]").click()
        driver.find_element_by_id("ControlGroupBookingListView_BookingListSearchInputView_HyperLinkModify_currentTravel1").click()
        driver.find_element_by_id("ControlGroupChangeItineraryView_BookingDetailChangeItineraryView_LinkButtonSubmit").click()
        self.assertEqual("You can still make changes in this booking. Click 'OK' to proceed with the changes, otherwise, click 'Cancel'.", self.close_alert_and_get_its_text())
        driver.find_element_by_id("PriceDisplayPaymentView_CheckBoxTermAndConditionConfirm").click()
        driver.find_element_by_id("ButtonSubmitProxy").click()
        driver.find_element_by_id("CONTROLGROUPPAYMENTBOTTOM_ButtonSubmit").click()
        
        print "success"
        #driver.find_element_by_id("kg-overlay").click()
    
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
    
    sys.argv = ['airasia.py']
    unittest.main()
