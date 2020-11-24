var emailExpr1 = /^\w+([\.-]?\w+)+[@admin.com]+$/;

var email = "samuel@ain.com";
emailExpr1.test(email) ? console.log("BIEN") : console.log("MAL");