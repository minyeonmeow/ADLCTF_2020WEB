function trigger_xss(){
    var zombie = require("zombie");
    var bot = new zombie();
    var flag = "ADLCTF{51mpl3_x55_4774ck}";
    bot.setCookie({name:"USERSESSID", domain:"web", value: flag});
    bot.visit("http://web/a08efb523c7d8a99b392cd177392080a08b225c5.php", {debug: true}, function(){});
};

trigger_xss();

