# GAMMA-APP 💡
<div id="here"></div>

## About this project 🤔
This project is part of a technical test as well as a mini project for testing the current newest versions of Angular and Symfony. 
The goal is to develop an Excel file import system called **Gamma App** with an attached interface for data management. As a user, I want to be able to import an Excel file into a database in order to view, edit, or delete information from a graphical interface. After making changes, I can export the updated data to a new Excel file. 🥳

It uses the **monorepo** strategy ✅:    

1- ⚡ **gamma-front**: The frontend application that will be exposed to the users.   
2- ⚡ **gamma_api**: A service that handles all the API calls.   
3- ⚡ **README file img**: This folder contains the DB SQL dump file, the new exported Excel file, and the images for this fantastic README file. 🥳  

### Built With 🛠️
* [Angular 13](https://angular.io), an open-source front-end framework for building dynamic web applications using TypeScript and HTML.
* [Symfony 6](https://symfony.com), a high-performance PHP web application framework that enables rapid development of robust and maintainable web applications.
* [My SQL](https://www.mysql.com/fr/), an open-source relational database management system used for storing and managing structured data.


### Testing and developing Tool 👀
* [Postman](https://www.postman.com/), an API development and testing tool that simplifies the process of sending HTTP requests, managing APIs, and analyzing responses.
* [XAMPP](https://www.apachefriends.org/fr/index.html), a free and open-source software package that provides a local server environment for web development, including tools like Apache, MySQL, PHP, and more.

<p align="right">(<a href="#here"> Go to the 🔝</a>)</p>


## Getting Started 🎉

In order to run this project and extend its functionalities you need to follow a few steps : 

### Prerequisites 🧷

* Make sure that Angular CLI is installed on your operating system.
* Make sure that Symfony CLI is installed on your operating system.
* Make sure that XAMPP is installed and running on your operating system.

### Installation 🔧

1. Clone the repo
   ```sh
   git clone https://github.com/oumaima-kboubi/gamma-app.git
   ```
##### If you want to build on top of the project   

2. Install NPM packages under the front project
   ```sh
   npm install
   ```
3. Install composer packages under the back API project
   ```sh
   composer install
   ```
3.  Add a **.env** file for required projects
   ```sh
   #DB connection string
   DATABASE_URL="MySQL connection string" 
   ...
   ```
 4. Run all projects, ensure that all ports are well set and enjoy!   
 
 
<p align="right">(<a href="#here"> Go to the 🔝</a>)</p>

## The app live demo  ♾️
* [THE LIVE DEMO for you to live the real experience🎵](https://www.youtube.com/watch?v=_X36k_RJxuY)
* The result file  **/The new bands.xlsx** and the DB SQL dump file  **/gammatest.sql** are under the folder  **README file img**.
## The App frontend Overview💻

* *Initial empty band list*

![image](https://github.com/oumaima-kboubi/gamma-app/blob/main/README%20file%20img/empty.png)

* *Import Excel file page*

![image](https://github.com/oumaima-kboubi/gamma-app/blob/main/README%20file%20img/excel%20uploaded.png)

* *Import Error*

![image](https://github.com/oumaima-kboubi/gamma-app/blob/main/README%20file%20img/error%20excel.png)

* *Fully imported and modified band list page*

![image](https://github.com/oumaima-kboubi/gamma-app/blob/main/README%20file%20img/modified%20list.png)

* *Edit band page*

![image](https://github.com/oumaima-kboubi/gamma-app/blob/main/README%20file%20img/edit.png)

* *Error edit band*

![image](https://github.com/oumaima-kboubi/gamma-app/blob/main/README%20file%20img/error%20edit.png)

* *Delete band*

![image](https://github.com/oumaima-kboubi/gamma-app/blob/main/README%20file%20img/delete.png)


<p align="right">(<a href="#here"> Go to the 🔝</a>)</p>

## Contact 📞

📧 Oumaima Kboubi - Kaboubioumaima@outlook.fr





