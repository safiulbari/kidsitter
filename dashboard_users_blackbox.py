from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
import time

driver = webdriver.Chrome(ChromeDriverManager().install())
driver.get("http://localhost/kidsitter/dashboard/home.php")
print(driver.title)


name = driver.find_element_by_xpath('/html/body/div[2]/div[2]/table/tbody/tr[2]/td[2]')
number = driver.find_element_by_xpath('/html/body/div[2]/div[2]/table/tbody/tr[2]/td[4]')
dob = driver.find_element_by_xpath('/html/body/div[2]/div[2]/table/tbody/tr[2]/td[5]')

input_name = input('Name:')
input_number = input('Phone Number:')
input_dob = input('Date of Birth:')

try: 
    if name.text == input_name and number.text == input_number and dob.text == input_dob:
        print("\033[1;32m Passed")
    else:
        print("Error")
except Exception as e:
    print(e)





while True:
    pass