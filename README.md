# SE_mis

    It a project for a mission system from the course which is 2018 ccu software engeneering.
    
## The team member is following :

    405410050 許紋浩
    405410010 毛胤年
    405410013 張可雋
    405410048 吳家瑋
    405410016 楊  淨
    405410039 闕浩文
    
## 安裝此專案請進行以步驟

1. 請clone一份程式碼至你所架設之web server 中。

2. 請在`lib/`資料夾中，建立檔案`config.php`，並在此檔案中建立以下內容 : 

  
 ```php
  <?php
    define("DB_USER",'');            //資料庫帳號
    define("DB_PASSWD",'');          //資料庫密碼
    define("DB_HOST",'localhost');   //資料庫HOST
    define("DB_NAME",'se_mis');      //資料庫名稱
    
    define("DB_USER_LOG",'');           //LOG資料庫帳號
    define("DB_PASSWD_LOG",'');         //LOG資料庫密碼
    define("DB_HOST_LOG",'localhost');  //LOG資料庫HOST
    define("DB_NAME_LOG",'se_mis_log'); //LOG資料庫名稱
    
    define("ROOT_PATH",'/SE_mis/');
```
    
    Hint : 以上定義請依照所架設環境做變更
    
3. 請建立兩個資料庫(名稱需與第2步所定義名稱相同)，並將`sql/`資料夾中的`se_mis.sql/`及`se_mis_log.sql/`匯入資料庫。

4. 完成以後即可使用本系統。

#### 預設密碼如下:

    管理員 : admin / admin
    人事 : personnel / personnel
    會計 : accountant / accountant

## 開發紀錄
```
Brench ** dev ** has been freezed on 2019/1/9, it stands fot a basis architecture finishing.
The second phase, we will maintain, enhancement the program in brench ** dev2 ** .
```
