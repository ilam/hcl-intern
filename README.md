HCL Infosystems Information Portal
==========


This project was started as an internal project in HCL Infosystems out of their need to communicate with different departments and team members through a common intranet Information Web Portal.
The existing Information Portal lacked a lot of features that are included in this project. The old one just showed the profile of the users and nothing more.

Features of HCL Portal
=====
* All the visitors can view the notices according to categories.
* New notices will be indicated on the left sidebar.
* Notices can be added and/or deleted only by the Admin
* HCL Forum - Employees can discuss their team issues.
* Logged in Users should be able to create new posts in the HCL Forum.
* Users can comment on any post in the HCL Forum.
* Admin controls the addition/deletion/updation of Users.
* Admin can also remove post(s) if it is found to be inappropriate..
* Admin can show/hide comments instead of deleting the comments.
* All the posts, notices, comments indicate the User and the Time of Creation.

Run the Project
====
    Upload all the files to the root folder of the Apache Server (with support for PHP4/5)
    Import the "portal" database into MySQL. You can do this by importing the localhost.sql into the MySQL Server.
    Update the MySQL server address, username and password in the header.php
    That is it !! Access the index.php from the browser and you are good to go !!
    Default User -  Username  : admin , Password : admin

Documentation
====
The documentation for the use and functionality provided is described extensively in the documents present in the docs folder of this repository.


