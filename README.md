# All is Well Employee Management System

Description for application EMS setup. This document contains the following steps

 * Requirements
 * Installation notes
 * EMS Functional specification

## a- Requirements 

- On windows, install [wamp server](http://www.wampserver.com/)
- PHP Version: 5.6.25

## b- Installation notes
- In the racine in your server, clone the repository:
```
	#git clone https://github.com/Charly2017/EMS.git
    #cd EMS
```
- Create the database 'ems'
- Import the file employees.sql to create the employees table under the ems database and to insert datas
- Then, go to: http://localhost/EMS

## c- EMS Functional specification

- List of All Is Well's employees
- Add, edit and delete one employee
- View profile of one employee
- Search employees by name and id
- Export a csv file with all employees whose salary is equal or below the amount specified by the user 
