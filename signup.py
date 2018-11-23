from selenium import webdriver
from selenium.webdriver.common.alert import Alert
import time
from flask import Flask, render_template, request
import pymysql
conn = pymysql.connect(host='localhost', user='root', password='root', db='khuthon', charset='utf8')
curs = conn.cursor(pymysql.cursors.DictCursor)
SQL = """INSERT INTO user (id,pw,name,belong,point) VALUES(%s, %s, %s,%s,%s)"""
app = Flask(__name__)

@app.route("/")
def index():
    return render_template('index.html',)

@app.route("/login_success")
def success():
    return render_template('success.html',)

@app.route("/login_fail")
def fail():
    return render_template('fail.html',)

@app.route("/login_check", methods = ['POST'])
def login():
    user = request.form['userId']
    pw = request.form['userPw']
    while True:
        try:
            driver.find_element_by_xpath('/html/body/div[7]/div[1]/button').click()
            break
        except:
            time.sleep(0.3)

    driver.find_element_by_xpath('//*[@id="userId"]').clear()
    driver.find_element_by_xpath('//*[@id="userId"]').send_keys(user)
    driver.find_element_by_xpath('//*[@id="userPw"]').clear()
    driver.find_element_by_xpath('//*[@id="userPw"]').send_keys(pw+'\n')

    while True:
        try:
            Alert(driver).accept()
            break
        except:
            time.sleep(0.3)
    try:
        frame = driver.find_element_by_xpath('/html/frameset/frame[3]')
        driver.switch_to.frame(frame)
        name =  driver.find_element_by_xpath('//*[@id="GNB-student"]/p[1]').text.split(':')[1].strip()
        depart=driver.find_element_by_xpath('//*[@id="GNB-student"]/p[2]').text.split(':')[1].strip()
        curs.execute(SQL, (user, pw, name,depart,'0'))
        conn.commit()
        driver.find_element_by_xpath('//*[@id="global"]/a[1]').click()
        driver.switch_to.default_content()
    except:# 실패
        driver.get('https://info21.khu.ac.kr/com/LoginCtr/login.do')
        return fail()
    return success()


if __name__ == "__main__": #서버 만드는거
    driver = webdriver.Chrome('./chromedriver')
    driver.get('https://info21.khu.ac.kr/com/LoginCtr/login.do')
    app.run()
