from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome(ChromeDriverManager().install())
driver.get("http://localhost:7882/landvalley/")

_icon = driver.find_element_by_xpath('/html/body/header/div[1]/div/div/div/div[2]/a[3]/i')
_icon.click()
time.sleep(5)
#print(driver.current_url)
_input1 = driver.find_element_by_name('username')
_input2 = driver.find_element_by_name('password')

_input1.send_keys("mripon")
_input2.send_keys("mripon1611")
time.sleep(2)
btn = driver.find_element_by_xpath('//*[@id="form"]/table/tbody/tr[6]/td[2]/input')
btn.click()
time.sleep(2)
navPacker = driver.find_element_by_xpath('/html/body/header/div[2]/div/div/div/ul/li[4]/a')
navPacker.click()
time.sleep(3)
_input3 = driver.find_element_by_name('name')
_input4 = driver.find_element_by_name('cno')
_input5 = driver.find_element_by_name('email')
submit = driver.find_element_by_xpath('//*[@id="form"]/table/tbody/tr[6]/td[2]/input')

_input3.send_keys("dltd")
_input4.send_keys("1391287562")
_input5.send_keys("d@gmail.com")
time.sleep(2)
submit.click()