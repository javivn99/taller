var emailExpr1 = /^\w+([\.-]?\w+)*@+\W+[admin]*(\.\w{2,3})+$/;
var admins = /^\w+([\.-]?\w+)+(@admin.com)+$/;

var email = "samuel@gmail.com";
admins.test(email) ? console.log("BIEN") : console.log("MAL");
emailExpr1.test(email) ? console.log("BIEN") : console.log("MAL");