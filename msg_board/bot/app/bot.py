# selenium bot written by davidhcefx, 2020.12.16.
import time
import traceback
from urllib3.exceptions import MaxRetryError
from selenium.webdriver import Remote
from selenium.webdriver.chrome.options import Options
from selenium.common.exceptions import WebDriverException

FLAG = "ADLCTF{51mp1e_R3fl3c7!0n_X55_4774ck_-_0N_4dm1n}"


def main(driver):
    driver.get('http://web')
    driver.add_cookie({'name': 'USERSESSID', 'value': FLAG})  # to same domain

    # view a message from anyone every N seconds
    while True :
        time.sleep(5)
        try:
            driver.get('about:blank')  # clear all alert box in case there is any
            driver.get('http://web/a08efb523c7d8a99b392cd177392080a08b225c5.php')
        except WebDriverException:
            header = 'Traceback (most recent call last):\n'
            print(header + ''.join(traceback.format_stack()[:-1])
                + traceback.format_exc()[len(header):])

if __name__ == '__main__':
    opts = Options()
    opts.add_argument("--headless")
    while True:
        try:
            driver = Remote(options=opts, command_executor='http://browser:4444/wd/hub')
            break
        except MaxRetryError:
            time.sleep(1)
            print('Reconnecting...')
    try:
        main(driver)
    except KeyboardInterrupt:
        driver.quit()  # clean up
