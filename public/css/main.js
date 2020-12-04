body {
  margin: 0px;
  padding: 0px;
  font-family: sans-serif; }

.header {
  display: flex;
  margin-top: 0px;
  background-color: black;
  color: white;
  flex-wrap: nowrap;
  align-items: center;
  height: 120px;
  margin-bottom: 0 25px;
  box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.3);
  width: 100%; }

.header-box {
  display: flex;
  margin: 0px;
  padding: 0px;
  margin-left: auto;
  margin-right: auto;
  max-width: 1200px;
  height: 120px; }

.logo-link {
  margin: 0px;
  padding: 0px;
  display: grid;
  float: left;
  width: 120px;
  height: 120px; }

.logo {
  width: 90%;
  padding: 5%;
  height: 90%; }

.nav-bar-box {
  display: flex;
  flex-wrap: wrap;
  margin: 0px;
  padding: 0px;
  width: 90%;
  margin-right: 25px; }

.title-login {
  padding: 0px;
  display: flex;
  justify-content: space-between;
  border-bottom: 1px solid #a8a8a5;
  height: 45%;
  margin: 0px;
  width: 100%;
  font-size: 18px;
  font-weight: 600px; }

.head-title {
  display: grid;
  padding: 10px 0px;
  color: #a8a8a5; }

.title-mobile {
  display: none;
  font-size: 25px;
  font-weight: 700px;
  color: white; }

.login {
  display: grid; }

.login a {
  text-decoration: none;
  color: #a8a8a5;
  padding: 10px; }

.login a:hover {
  border-top: 2px solid white; }

#login-mob {
  display: none; }

.nav-bar-mob {
  position: relative; }

.nav-bar {
  display: flex;
  padding: 0px;
  width: 100%;
  margin: 0px;
  height: 55%; }

.nav-bar ul {
  display: flex;
  flex-wrap: nowrap;
  width: 100%;
  margin: auto;
  float: none;
  margin-top: 0px;
  height: 100%; }

.nav-bar ul > li {
  display: flex;
  flex-wrap: nowrap;
  list-style: none;
  text-decoration: none;
  margin: auto;
  float: left;
  height: 100%; }

.nav-bar ul > li > a {
  color: white;
  padding: 10px;
  text-decoration: none;
  font-size: 18px;
  font-weight: 700;
  margin: auto;
  height: 100%; }

.nav-bar ul > li > a > span {
  display: inline-block;
  margin-top: 10px; }

.nav-bar ul > li > a:active {
  border-top: 2px solid yellow;
  color: yellow; }

.nav-bar ul > li > a:hover {
  border-top: 2px solid white; }

.dropdown-menu {
  display: none;
  background-color: black;
  top: 65px;
  position: absolute;
  z-index: 1;
  box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.3);
  border-radius: 3px; }

.dropdown-menu a {
  text-decoration: none;
  color: white;
  display: block;
  text-align: left;
  padding: 10px;
  font-size: 18px;
  min-width: 200px;
  border-bottom: 1px solid #241f1f; }

.dropdown-menu a:hover {
  background-color: #241f1f; }

.dropdown-link:hover .dropdown-menu {
  display: block; }

.ham-menu {
  display: none; }

.container {
  display: inline-block;
  cursor: pointer; }

.bar1, .bar2, .bar3 {
  width: 35px;
  height: 5px;
  background-color: white;
  margin: 6px 0;
  transition: 0.4s; }

.change .bar1 {
  -webkit-transform: rotate(-45deg) translate(-9px, 6px);
  transform: rotate(-45deg) translate(-9px, 6px); }

.change .bar2 {
  opacity: 0; }

.change .bar3 {
  -webkit-transform: rotate(45deg) translate(-8px, -8px);
  transform: rotate(45deg) translate(-8px, -8px); }

i {
  border: solid white;
  border-width: 0 1px 1px 0;
  display: inline-block;
  padding: 2px; }

.caret {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg); }

#mobile-navigation {
  display: flex;
  flex-direction: column;
  top: 120px;
  background-color: #0b0404;
  left: 0;
  position: absolute;
  opacity: 0.9;
  z-index: 1000;
  height: 500px; }

.dropdown-menu-mob {
  display: block;
  position: relative;
  margin-left: 10%;
  background-color: #201b1b;
  border-bottom: white;
  top: 0px; }

#mobile-navigation .dropdown-menu-mob a {
  top: 0; }

#mobile-navigation li {
  display: block;
  width: 100%;
  height: auto;
  background-color: #0b0404; }

#mobile-navigation li > a {
  display: block;
  width: 100%; }

.image-info {
  background-image: url("../assets/img/bg.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 620px;
  background-position: center; }

.internal-links {
  width: 60%; }

#footer {
  display: flex;
  flex-wrap: wrap;
  background-color: black;
  color: white;
  font-size: 16px;
  box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.3); }

#links {
  display: flex;
  margin-left: 10%;
  margin-right: 10%;
  width: 80%; }

#internal-links {
  display: flex;
  width: 75%;
  float: left;
  flex-wrap: wrap;
  border-right: 1px solid #4e4b4b; }

#internal-links li {
  width: 33.33%;
  padding-bottom: 10px;
  list-style-type: none; }

#internal-links li > a {
  text-decoration: none;
  color: white;
  font-size: 16px; }

#footer h4 {
  display: block;
  width: 100%;
  text-align: center;
  font-size: 14px;
  color: #b3aeae;
  background-color: rgba(50, 50, 50, 0.3);
  padding-top: 10px;
  padding-bottom: 10px;
  margin-bottom: 0px; }

#external-links {
  display: flex;
  flex-wrap: nowrap;
  width: 25%; }

.fa {
  padding-top: 10px;
  font-size: 20px;
  text-align: center;
  text-decoration: none;
  margin: 20px 10px;
  height: 35px;
  width: 40px;
  border-radius: 5px; }

.fa:hover {
  opacity: 0.7; }

.fa-facebook {
  background: #3B5998;
  color: white; }

.fa-twitter {
  background: #55ACEE;
  color: white; }

.fa-youtube {
  background: #bb0000;
  color: white; }

/*
.content{
    margin-top:120px;
}
*/
@media screen and (max-width: 900px) {
  .header-box {
    width: 100%;
    flex-wrap: wrap-reverse; }

  .box-mobile {
    display: flex;
    width: 100%; }
    .box-mobile .title-login {
      display: none; }
    .box-mobile .title-mobile {
      display: grid;
      margin-top: 45px;
      left: 130px;
      position: absolute; }

  .dropdown-menu {
    top: 0px;
    position: relative; }

  .login-mob {
    display: block; }

  .nav-bar-mob {
    display: block; }

  .nav-bar-mob ul {
    display: none;
    flex-direction: column;
    top: 100px;
    background-color: #0b0404;
    left: 0;
    position: absolute;
    opacity: 0.9;
    z-index: 1000; }

  .ham-menu {
    display: grid;
    right: 20px;
    position: absolute;
    margin-top: 40px; }

  #links {
    flex-wrap: wrap; }

  #external-links {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    border-top: 1px solid #4e4b4b; }

  #internal-links {
    border-right: none; }

  #internal-links li {
    padding: 10px 30px;
    width: 120px; } }
@media screen and (min-width: 900px) {
  #mobile-navigation {
    display: none; } }

/*# sourceMappingURL=main.js.map */
