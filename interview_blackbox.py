from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
import time

driver = webdriver.Chrome(ChromeDriverManager().install())
driver.get("http://localhost/kidsitter/interview.php")
print(driver.title)


date = driver.find_element_by_xpath('/html/body/table/tbody/tr[2]/td[2]')
interview_time = driver.find_element_by_xpath('/html/body/table/tbody/tr[2]/td[3]')
meet_link = driver.find_element_by_xpath('/html/body/table/tbody/tr[2]/td[4]/a[1]')

input_date = input('Date:')
input_time = input('Time:')
input_link = input('Link:')

try: 
    if date.text == input_date and interview_time.text == input_time and meet_link.text == input_link:
        print("\033[1;32m Passed")
    else:
        print("Error")
except Exception as e:
    print(e)





while True:
    pass