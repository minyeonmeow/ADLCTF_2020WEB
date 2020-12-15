function trigger_xss(){
    var zombie = require("zombie");
    var bot = new zombie();
    var flag = "ADLCTF{51mpl3_r3f13c710n_x55_4774ck_0n_4dm1n}";
    bot.setCookie({name:"USERSESSID", domain:"web", value: flag});
    bot.visit("http://web/a08efb523c7d8a99b392cd177392080a08b225c5.php", {debug: true}, function(){});
};

trigger_xss();

