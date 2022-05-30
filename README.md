# WebAppAssignment
Daily Task Management System

Instruction:
database fiile  = task.sql
home page of the website file = index.sql
All files are in php

Steps
1)install XAMPP application
2)Open XAMPP application
3)Enable Apache before open the php file
4)Enable MySQL before open the php file
5)After enabled the Apache and MySQL in XAMPP application, first open 
  the main webpage (index.php)
6)In the main webpage,User has to create new account by clicking on the
  sign up button and it will link to (regUser.php).
7)After sign up,it will store the user data in the user table on task.sql 
8)After the data stored,it will redirect back to main webpage(index.php)
9)In the main webpage,user can view about by clicking on the about us on the website.It will 
   link to (about.php)
10)In the main webpage,user can contact the admin of the website by clicking on the contact us on the website.It will 
   link to (contact.php). 
11)In the main webpage, User or admin has to sign in by clicking on sign in option and it will link to sign in webpage(signin.php)
   with email address and password entered. If there is mismatch on email address and password, error page occur.
   If the user is been deactivated, the error message appear will direct the user to contact page.
   note: admin sign in will link to admin dashboard. (dashboard.php) (example : email address : admin@hotmail.com , password: 123)
   note: user sign in will link to user dashboard. (userdashboard.php) (example : email address : user@hotmail.com , password: 123)
   
Test data for login
    --------------------
   Test data for the system will list at below.
	a)Test data for login for username and password unmatch.
	Email address : apple@hotmail.com
	Password : 123
	Result : Success
	Message : Your login name or password is invalid.
	Action: Select ¡®Ok¡¯ on message, stay in the sign in page.
     b)   Test data for inactive user status.
	Email address: tester@hotmail.com
	Password : 123
             Result : Success
	Message: Your account inactive, please contact us for further details. 
	Action : Select ¡®Ok¡¯ on message, direct to contact us page.
     c) Test data for valid user account.
         Email address: user@hotmail.com
         Password: 123
        Result : Success
        Page Display: User Dashboard
    d) Test data for valid admin account
        Email address: admin@hotmail.com
        Password : 123
        Result : Success
        Page Display: Admin Dashboard
e) Test data for unregistered user to create account to register as an user for the system.
     Email address: orange@hotmail.com
     Password: 123
     Result: Success
     Message: New record created successfully.


12)Admin can manage user account by clicking on the manage user option.From there,admin can edit user details.  (manageUser.php)
13) In the manage user page, admin can view all user records from the database.In addition, admin can create user account by click
     create user button in the form that link to createUSer.php  . If admin wants to update user account, just click edit at the user       record table will link to update user from with updateUser.php
14)After signing in, User can select the view calendar to direct to calendar 
  webpage(calendar.php) to manage tasks.  
15)In the calendar webpage(calendar.php),user can alter the month and year
 by clicking on the previous and next button.
16)In the calendar webpage(calendar.php),user can add task by clicking on the
 date number and it will direct the user to the event form(eventadder.php) 
 for user to insert task details.
17)After inserted the task details,User can click on the clear button if the data 
 is entered wrongly else user can submit the task details to MySQL(task.sql) and
 the task details stored in eventdata table.
18)After the task details stored in MySQL then it will automatic redirect to 
 calendar webpage(calendar.php)
19)In the calendar webpage(calendar.php), user can view the task added by clicking
 on the view task button then it will link the view webpage(view.php), then the
 view webpage(view.php) will extract data from the eventdata table in task.sql and
 display on the view webpage.
20)In the view webpage,User can click on delete line(remove.php) to delete the unwanted task information.
21)After the view webpage, user can click on the back button to return to calendar webpage
 (calendar.php)
22)After returned to calendar webpage(calendar.php), User can download the task by
 clicking on the print task and it will redirect to download.php and extract value
 existed from the eventdata table in task.sql and export it as Task.csv on the 
 calendar webpage(calendar.php).It will not redirect to a new page, when print button
 is pressed,the Task.csv will be downloaded on calendar webpage.
   		
