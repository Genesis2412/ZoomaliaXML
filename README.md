Zoomalia



*******************Start************************************
Brief

Zoomalia is here to promote adoption, to ease veterinary 
services and to help us(donation) to nurture these pets in 
our facility till someone comes to adopt them.

************************************************************

Folder video-consists video for the slider in index.php

css folder-consists all styling for the webpages

img folder-consists all the image for the webpages

************************************************************

connection.php-all connection of database is done here

logout.php-destroy all sessions

create.sql-all sql codes

***********************NOTE*********************************

Create a database named Zoomalia on a localhost
Codes are found in create.sql

--To add php xslt processor--
Go to xampp/php, search and update php.ini, search extension=php_ftp.dll in php.ini and add extension=php_xsl.dll, and save

**********************Newly Added***************************
--Hiresh--
Brief: Shopping cart system with xml. A dashboard added for the admin to manipulate and track products details, clients details, messages and website users.

adminPage.php -main page of the admin dashboard

adminLogin.php -admin login form
adminLoginCheck.php -validates admin login

adminRegisterCheck.php -validates form input details
checkemail.php -check if email already exists

adminLogout.php -unset the session for the admin

adminMessage.php -display all messages sent bu users

adminUser.php -displays all the details of the signed up users
deleteUser.php -admin can delete a signed up user

catproduct.php -displays all cat products only(xpath)
catshoplist.php -filters the elements by its category(attribute)
cataddcart.php - gets the id, filters the products.xml and then add it to a session cart

dogproduct.php -displays all dog products only(xpath)
dogshoplist.php -filters the elements by its category(attribute)
dogaddcart.php - gets the id, filters the products.xml and then add it to a session cart

incart.php -displays all items in the session

checkout.php -a form for client to input details of payment
checkoutcheck.php -get values from form and then add it to clients.xml
deleteSession.php -remove item from cart if user removes it or when form(checkout.php) is submitted

clients.xml -save details of clients and products
clients.xsd -validates datatype of clients.xml
clients.xslt -display the data in clients.xml via xslt
clientdisplay.php -converts xslt to php so that it can be fetch with jquery in adminPage.php

README.md

Updation of website navigation links

--Keerti--
products.xml -contains all the details of the products in xml format
products.xsd -validates datatype of the xml file

crud.php - displays all the data of products.xml
addDogProducts.php - form to insert new dog products in the xml
addCatProducts.php - form to insert new cat products in the xml


What we achieved?
--Hiresh--
XML with XSD and XSLT
Use of AJAX and DOM to get display items from XML
Use of PHP to display items from XML, create new XML file, insert in the new XML file
Use of an XSLT processor (PHP extension) to link an XSLT stylesheet with XML file and display it with PHP

--Keerti--
XML with XSD and PHP
How to use php to display products of the xml file
How to use php to enter new products in the xml file
************************************************************

index.php-homepage of website

messageCheck.php-validate fields & check if message is sent

************************************************************

cat.php/dog.php-displays all dogs and cats in database

dogCat_adopt-Choose what to adopt(dog/cat) and display 
via an iframe

adopt_form.php-form that takes details of the adopter

adoptCheck.php-proceed to insertion of adopter

************************************************************

donate.php-form of donation

submit.php-validate details and insert the details of donor

************************************************************

veterinary.php-display all veterinary facilities available

************************************************************

register.php-Register form(display message if email valid 
or not)

checkemail.php-AJAX validation to check email

registerCheck.php-insert details in database(password md5 
encryption)

************************************************************

login.php-login form(display if email/password wrong)

loginCheck.php-validate email and password using header..

************************************************************

donateSelect.php-display details if had done donation or 
not

************************************************************
THANK YOU FOR YOUR TIME

Credits:
Name:Keerti Jhummun 
ID:1912253
Name:Pandoo Hiresh 
ID:1910196

****************************END*****************************

