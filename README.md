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
- Flag:
    - ADLCTF{51mpl3_5ql_1nj3c710n}
    - ADLCTF{IdNonMesFecGaxJacet9twetefCalNoa}
- Caution:
    - 如果沒做限制，time-based inj. 會讓 memory 用盡，導致 out-of-memory 災難。
- Points: 
    - 50
    - 100
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
