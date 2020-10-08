var express = require('express');

var http = require('http');
var path = require('path');
var app = express();
var fs = require('fs');
var mysql = require('mysql');
var conn = require('connect');
var bodyParser = require('body-parser');
var ejs = require('ejs');

var cookieParser = require('cookie-parser');
var session = require('express-session');

app.set('view engine','ejs');
app.set('views');
app.use(express.static(path.join(__dirname)));

app.use(cookieParser()); //cookie-parser설정
app.use(session({
    //세션키
    secret : 'my key',
    resave: true,
    saveUninitialized: true
}));
