# Exercise 5: Readme.md

# Eastern Kitchen Restaurant - Team 15

Our website, Eastern Kitchen Restaurant, offers both online ordering and table reservations for customers.

## Table of Contents
- [Features](#features)
- [Database Tables](#database-tables)
- [Created Forms](#created-forms)
- [Created Tables](#created-tables)

---

## Features

In this section, list and describe the features or functionality that you are working on. You can use checkboxes to track the progress of each feature.

- [ ] Feature 1 (Sonali Mitua): Booking. 
- [ ] Feature 2 (Dan Le): Orders Online. Add To Cart. Search / Sort for Menu Page. Index Page. Thank you Page.
- [ ] Feature 3 (Quan Le):Log In/ Log Out.
- [ ] Feature 4 (Phuong Le):Admin management: Report, update, delete information.
- [ ] Feature 5 (Quan Le): Menu Page
- [ ] Feature 6 (Quan Le): Create Account, Customers Page

### Feature 1

Feature for customers to book table.
-Links github:
+ [booking - Github](https://github.com/o0akin0o/WebProgrammingTeam15/blob/sonali/src/featuers/bookingfood.php)
- Link to the feature (shell.hamk.fi) :
    + [booking - shell.hamk.fi](http://shell.hamk.fi/~sonali23000/web-dev-env-main/src/sm_tasks/WebProgrammingTeam15/src/featuers/bookingfood.php)

### Feature 2

#### Menu Page Features

- **Menu Page**: 
  - GitHub: [Menu Page - GitHub](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/menu.php)
  - Demo: [Menu - shell.hamk.fi](http://shell.hamk.fi/~bbcap23_15/src/pages/menu.php)

- **Search and Sort**: 
  - GitHub: [Search-Sort - GitHub](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/features/search_sort.php)

- **Process Cart**: 
  - GitHub: [Process-Cart - GitHub](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/features/process_cart.php)

#### Cart Page Features

- **Cart Page**: 
  - GitHub: [Cart - GitHub](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/cart.php)
  - Demo: [Cart - shell.hamk.fi](http://shell.hamk.fi/~bbcap23_15/src/pages/cart.php)

- **Update/Delete/Complete**: 
  - GitHub: [Update-Delete-Complete - GitHub](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/features/cart_feature.php)

#### Item Details Features

- **AddToCart Page**: 
  - GitHub: [AddToCart - GitHub](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/add-to-cart.php)
  - Demo: [AddToCart - shell.hamk.fi](http://shell.hamk.fi/~bbcap23_15/src/pages/add-to-cart.php?id=1)

- **Add item/item details**: 
  - GitHub: [Add-To-Cart - GitHub](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/features/add_to_cart_feature.php)

### Feature 3

Features for customers to log in, Logout your Account. 
- [Login - Github](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/login.php)
- [Login - shell.hamk.fi](http://shell.hamk.fi/~bbcap23_15/src/pages/login.php)

### Feature 4

Features for admin to make reports for the restaurant: income, numbers of customers, bookings, orders.
Features to update information, delete information.
 - Links github:
   + [Admin - report](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/report.php)
   + [Admin - update & delete](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/admin.php)
-  Links to the feature (shell.hamk.fi):
    + [Admin-report- shell.hamk.fi](http://shell.hamk.fi/~bbcap23_15/src/pages/admin.php)
    + [Admin - update & delete](http://shell.hamk.fi/~bbcap23_15/src/pages/report.php)

### Feature 5

Features for load products from database. 
- [Menu - Github](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/menu.php)
- [Menu - shell.hamk.fi](http://shell.hamk.fi/~bbcap23_15/src/pages/menu.php)

### Feature 6

Features for customers to create account and track their orders/booking/profile. 
- [Create Account - Github](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/create_account.php)
- [Create Account - shell.hamk.fi](http://shell.hamk.fi/~bbcap23_15/src/pages/create_account.php)

## Database Tables

List the database tables that are part of your project. 

- Table 1 (Created By Sonali Mitua): Booking
- Table 2 (Created By Quan Le): Customers, Products
- Table 3 (Created By Dan Le): Order, Order_detail
> Include the ER Diagram of the database. 

![table](https://github.com/o0akin0o/WebProgrammingTeam15/assets/7956848/90eebd1b-2e85-4ee3-a660-1c3ababb2f83)


## Created Forms

List and describe any forms that have been created as part of your project. Include details about the purpose of each form and any validation logic.

- Form 1 (Created By Sonali Mitua): Form Name: Booking confirmation [github](https://github.com/o0akin0o/WebProgrammingTeam15/blob/sonali/src/featuers/Bookingconfirmation.php) | [shell.hamk.fi](http://shell.hamk.fi/~sonali23000/web-dev-env-main/src/sm_tasks/WebProgrammingTeam15/src/featuers/Bookingconfirmation.php). | Validations Applied
- Form 2: (Created By): Form Name: Link to the related code file (github) | Link to the form (shell.hamk.fi).  | Validations Applied


- Form 3: (Created By Dan Le): Form Name: Checkout Page [github](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/cart.php)
 | [shell.hamk.fi](http://shell.hamk.fi/~bbcap23_15/src/pages/cart.php).  | Validations Applied
     + The form allows users to view and manage items in their shopping cart before placing an order. It consists of a table displaying the items in the cart, along with their prices, quantities, and total amounts. Additionally, users can update quantities or remove items from the cart. Below the cart table, there is an order review section displaying a summary of the selected items and the total cost. Finally, there is a section for entering customer details and placing the order.
     + Purpose: The purpose of the form is to provide users with a convenient way to reiew and manage their orders before finalizing them. Users can adjust the quantities of items, remove unwanted items, and enter their contact and delivery information before placing the order.
     + Validation: user needs to log in first before completing order. All contact form fields are required.
 
   
- Form 4: (Created By Phuong Le):  Form Name: Update Order [github](https://github.com/o0akin0o/WebProgrammingTeam15/blob/main/src/pages/update.php)
  | [shell.hamk.fi] (http://shell.hamk.fi/~bbcap23_15/src/pages/update.php)
    + The form allows admin to view, update orders, delete order
    + Form(s) with JavaScript validation: User must fill information in required field: Name, total order, status, order's note
    + JavaScript event handlers for HTML elements:  The name field must be filled in with specific requirements. Show a notification if the user input does not meet the requirements."



## Created Tables

List any tables that you have created in the project work

- Table 1 (Created By): Table Name | Link to the related code file (github) | Link to the table (shell.hamk.fi).
- Table 2 (Created By): Table Name | Link to the related code file (github) | Link to the table (shell.hamk.fi).
- Table 3 (Created By Dan Le): Order, Order_Details | Link to the related code file (github) | Link to the table (shell.hamk.fi).

---



>Note: Every members can customize this README template to suit the project's specific needs. Providing clear and organized documentation will help your team members understand the project's progress and tasks effectively. This document will have a significant impact on the grading. 
