from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome(ChromeDriverManager().install())

driver.get("http://localhost/kidsitter/settime.php")
# print(driver.title)



date = driver.find_element_by_xpath('/html/body/div[3]/form/div/div[1]/input')
timee = driver.find_element_by_xpath('/html/body/div[3]/form/div/div[2]/input')
link = driver.find_element_by_xpath('/html/body/div[3]/form/div/div[3]/input')

link.send_keys("xxxxxxxxxx")
time.sleep(5)
#timee.send_keys("8:58 PM")
#time.sleep(5)
#link.send_keys("xxxxxxxxxx")

btnSubmit = driver.find_element_by_xpath('/html/body/div[3]/form/div/button')
btnSubmit.click()

try:
	banner = driver.find_element_by_xpath('/html/body/div[3]/form/div/p')
	print(banner.text)
	if banner.text == "Fill all the fields !!!!":
		print("OK")
	else:
		print("Banner Text is incorrect")

except Exception as e:
	print(e)

print("Done")


while True:
	pass