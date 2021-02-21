# 2020-web

Web for 2020 NCU ADL CTF

# Setup

- Run `sudo ./setup_all_container.sh up` to bring the challenges online.

 
# Problem Set
### Hello Pika!
- Author: genesis
- Tricks: view html source, set-cookie and expiration
- Flag:
    - ADLCTF{p1k4_w0w_u_C4N_r3aD_we6_SRc!}
    - ADLCTF{pika_u_f0und_4n_eXp12ED_c00k13!}
- Points:
    - 50
    - 50
- Port: 12001

### Pika Baby
- Author: genesis, davidhcefx
- Tricks: php == compare, strcmp([])
- Flag: ADLCTF{l0053_c0mp4r150n5_n_Nu11_4rr4y_php_15_A_cr42y_14n6ua6e}
- Points: 100
- Port: 12002

### Cute pika
- Author: peanut0203
- Tricks: LFI, cookie unserialize, upload webshell
- Flag: ADLCTF{D0n7_mAk3_uR_SrC_c0d3_4cCeSs1B1e}
- Points: 100
- Port: 12003

### Pika-i
- Author: genesis, davidhcefx
- Tricks: SQL injection (without sqlmap)
- Description: <img src="https://i.redd.it/564mvzcoa2y21.jpg" width="100%">
- Hint:
    - *Could you plz shed some lite,*  
      *On this scary buggy site?*  
      *Answer me, yes or no,*  
      *Boolean is the type I sought.*
- Flag:
    - ADLCTF{51mpl3_5ql_1nj3c710n}
    - ADLCTF{IdNonMesFecGaxJacet9twetefCalNoa}
- Caution:
    - 如果沒做限制，time-based inj. 會讓 memory 用盡，導致 out-of-memory 災難。
- Points: 
    - 50
    - 50
- Port: 12004

### Report to admin (msg_board)
- Author: genesis, davidhcefx
- Tricks: XSS
- Description:
    - [About](https://www.facebook.com/nctfu/) | Learn more about our stories.  
    - [Report](http://ctf.adl.tw:12005/) | Found some bugs? Please report to us!  
    - [Help](https://tlk.io/ncu-security-2020) | Get help from the developer community.
- Flag: ADLCTF{51mp1e_R3fl3c7!0n_X55_4774ck_-_0N_4dm1n}
- Points: 100
- Port: 12005


# Demo

- 一組 25min，但覺得時間不夠。

- Demo 問題參考:
    - Hello Pika：
        1. img alt 是用來幹嘛的？
        2. 為什麼 F12 的 Application 裡面看不到第二個 cookie？
        3. 什麼是 base64 格式？

    - XSS：
        1. (看他們用什麼tag) iframe 是用來幹嘛的？
        2. 描述一下，一個 XSS payload 送出以後，到偷取使用者 cookie 之間，會發生什麼事。(server 會執行你的 js code 嗎？)
        ![pic](https://i0.wp.com/www.informationq.com/wp-content/uploads/2017/12/What-is-a-Web-Server.jpg)
        3. 如果你要針對這樣的攻擊做防禦的話，你會怎麼防？(eg. 角括號, CSP)

    - SQLi：
        1. 這是 server 的 src code，解釋一下你的 payload 怎麼 work 的。
        ![pic](https://git.adl.tw/ADC-CTF/2020-web/-/blob/master/pika_inj/demo/sqli_src_code.png)
        2. (第二題，問 SQL 語法相關細節) (沒寫的話，用上圖及下圖引導，問有什麼想法)
        ![pic](https://git.adl.tw/ADC-CTF/2020-web/-/blob/master/pika_inj/demo/sqlite_table.png)
        3. (假設不是用二分搜) 你們是掃過所有 printable char 嘛，那可以怎麼加速？

