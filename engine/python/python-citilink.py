# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re

class PythonCitilink(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(30)
        self.base_url = "https://book.citilink.co.id"
        self.verificationErrors = []
        self.accept_next_alert = True
    
    def test_python_citilink(self):
        driver = self.driver
        driver.get(self.base_url + "/LoginAgency.aspx")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        #driver.find_element_by_link_text("Login").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_TextBoxUserID").clear()
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_TextBoxUserID").send_keys("0038000423")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_PasswordFieldPassword").clear()
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_PasswordFieldPassword").send_keys("LiNeLuCNCt!1")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        
        driver.find_element_by_id("ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_ButtonLogIn").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListVieworiginStation1")).select_by_visible_text("Balikpapan (BPN)")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListViewdestinationStation1")).select_by_visible_text("Surabaya (SUB)")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("AvailabilitySearchInputBookingListView_OneWay").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("AvailabilitySearchInputBookingListView_RoundTrip").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListMarketDay1")).select_by_visible_text("12")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListMarketDay2")).select_by_visible_text("18")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListPassengerType_CHD")).select_by_visible_text("1")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("AvailabilitySearchInputBookingListView_DropDownListPassengerType_INFANT")).select_by_visible_text("1")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("AvailabilitySearchInputBookingListView_ButtonSubmit").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("ControlGroupScheduleSelectView_AvailabilityInputScheduleSelectView_RadioButtonMkt1Fare4").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("ControlGroupScheduleSelectView_AvailabilityInputScheduleSelectView_RadioButtonMkt2Fare4").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("ControlGroupScheduleSelectView_ButtonSubmit").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxFirstName").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxFirstName").send_keys("Nama")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxMiddleName").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxMiddleName").send_keys("Agent")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxLastName").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxLastName").send_keys("Disini")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxFirstName").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxFirstName").send_keys("Lentera")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxMiddleName").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxMiddleName").send_keys("Informatika")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxLastName").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxLastName").send_keys("PT")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxHomePhone").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ContactInputPassengerView_TextBoxHomePhone").send_keys("085624203342")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_0").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_0").send_keys("Andryana")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_0").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_0").send_keys("Syafitri")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_1").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_1").send_keys("Rasya")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_1").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_1").send_keys("Atsaqof")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateDay_1")).select_by_visible_text("24")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateMonth_1")).select_by_visible_text("Apr")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateYear_1")).select_by_visible_text("2011")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_0_0").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxFirstName_0_0").send_keys("Aluna")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_0_0").clear()
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_TextBoxLastName_0_0").send_keys("Aisyah")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListGender_0_0")).select_by_visible_text("Female")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateDay_0_0")).select_by_visible_text("1")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateMonth_0_0")).select_by_visible_text("Jan")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        Select(driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_DropDownListBirthDateYear_0_0")).select_by_visible_text("2014")
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_PassengerInputViewPassengerView_RadioButtonInsurance_1").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPASSENGER_ButtonSubmit").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("ControlGroupUnitMapView_UnitMapViewControl_LinkButtonAssignUnit").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("HOLD_tab").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPAYMENTBOTTOM_ControlGroupPaymentInputViewPaymentView_AgreementPaymentInputViewPaymentView_CheckBoxAgreement").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        driver.find_element_by_id("CONTROLGROUPPAYMENTBOTTOM_ButtonSubmit").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        #driver.find_element_by_css_selector("input.buttonN").click()
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        #self.assertEqual("Please note that after Itinerary is printed, you will be redirect back to Search page.\nKindly ensure you have note down your Booking Number for reference purpose.", self.close_alert_and_get_its_text())
        
        # ERROR: Caught exception [ERROR: Unsupported command [selectWindow | name=Subang | ]]
        # ERROR: Caught exception [ERROR: Unsupported command [waitForPopUp | popUpWindow | 30000]]
    
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
    unittest.main()
