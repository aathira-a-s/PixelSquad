<p align="center">
  <img src="./img.png" alt="Project Banner" width="100%">
</p>

# ZapRent : Instant Gadget Rentals 🎯

## Basic Details

### Team Name: PixelSquad

### Team Members
- Member 1: Balasoorya D A - Jain University, Kochi
- Member 2: Aathira A S - Jain University, Kochi

### Hosted Project Link
[mention your project hosted link here]

### Project Description
ZapRent is a smart micro-rental platform that allows users to instantly rent essential gadgets like chargers, power banks, and earphones for short durations. It solves the common problem of forgetting gadgets by providing fast, affordable, and convenient access in places like colleges and public spaces. ZapRent promotes a sharing economy while reducing unnecessary electronic waste.

### The Problem Statement
In today’s digital world, essential electronic gadgets like chargers, power banks, earphones, and adapters are a daily necessity. However, people often forget these items at home, especially in fast-paced environments like colleges, offices, libraries, and public spaces. When this happens, they are left with limited options - either borrow from someone, which may be inconvenient, or purchase a new gadget for temporary use, which is expensive and leads to unnecessary electronic waste. There is currently no efficient, affordable, and instant solution for short-term gadget emergencies.

### The Solution
ZapRent is a smart micro-rental web platform designed to provide instant access to essential electronic gadgets for short durations. Users can log in, check real-time gadget availability, select a rental duration, and securely rent the gadget when needed. By enabling temporary access instead of permanent ownership, ZapRent offers a cost-effective, convenient, and sustainable solution that promotes a sharing economy while reducing unnecessary electronic waste.

## Technical Details

### Technologies/Components Used

**For Software:**
- Languages used: HTML, CSS, JavaScript, PHP, SQL
- Frameworks used: None
- Libraries used: None
- Tools used: VS Code, XAMPP (Apache & MySQL), Git, GitHub, phpMyAdmin

## Features

Feature 1: Secure User Authentication
Users can register and log in securely to access the rental platform and track their bookings.

Feature 2: Gadget Listing with Availability Status
Users can view all available gadgets along with their current status (Available/Rented).

Feature 3: Day-Based Rental Selection
Users can choose the number of rental days as per their requirement. The system calculates the total rental cost automatically based on selected duration.

Feature 4: Admin Management Panel
Admin can add or remove gadgets, monitor rentals, manage users, and track overall revenue.


## Project Documentation

### For Software:

### Login Page
![WhatsApp Image 2026-02-14 at 5 52 36 PM](https://github.com/user-attachments/assets/3bb0ad2d-72b5-4aab-b586-7fef85e02f75)
The Login Page allows registered users to securely access the ZapRent platform by entering their email address and password. It ensures authenticated access to user-specific features such as browsing gadgets, managing rentals, and viewing booking details.

### Product Listing Page
<img width="1359" height="628" alt="image" src="https://github.com/user-attachments/assets/2cdab342-f8d3-472e-9692-b201a216e355" />
This screen displays the Product Listing Page of the ZAPRENT platform, where users can browse available gadgets for rent. Each product card shows the gadget image, name, brief description, rental price, and an option to add the item to the order. The page enables users to compare multiple gadgets and select suitable tech bundles based on their requirements.

### Admin Dashboard
<img width="1358" height="252" alt="image" src="https://github.com/user-attachments/assets/7e918bfa-9625-4794-bf82-cd3312f1e152" />
This screen represents the Admin Dashboard of the ZAPRENT platform, where administrators can monitor and manage all rental requests. It displays customer details, rented products, delivery addresses, and current rental status. This module helps ensure efficient order tracking, delivery management, and overall system administration.

### Delivery Partner Dashboard
<img width="1356" height="622" alt="image" src="https://github.com/user-attachments/assets/a31ccc9d-5f21-49e1-9993-d138d020899a" />
This screen shows the Delivery Partner Dashboard of the ZAPRENT platform. It allows delivery personnel to view assigned rental orders along with customer details, delivery address, and current order status. The delivery partner can update the order status in real time (e.g., picked up, on the way, delivered), ensuring smooth coordination between the admin, customer, and delivery team.


#### Diagrams

**System Architecture:**

<img width="415" height="668" alt="image" src="https://github.com/user-attachments/assets/dc4197bb-3904-48b7-9c51-09c0afbfa1b0" />

The system follows a layered architecture where the user interacts with the application through a web browser. The frontend, built using HTML, CSS, and JavaScript, handles user interface rendering and captures user actions such as login, product selection, and rental requests. These requests are sent to the PHP backend, which processes authentication, rental logic, and cost calculations. The backend communicates with the MySQL database to store and retrieve data from the Users, Orders, and Products tables. The database returns the requested information to the backend, which then sends the response back to the frontend for dynamic display. This structured separation ensures secure data handling, smooth data flow, and better system maintainability.

**Application Workflow:**

<img width="940" height="513" alt="image" src="https://github.com/user-attachments/assets/a99da68b-0bfd-409b-92a7-c5ce4289ca24" />

This workflow diagram illustrates the end-to-end operation of the ZapRent: Instant Gadget Rentals system. The process begins when a user accesses the website through a browser, triggering the frontend built using HTML, CSS, and JavaScript. User actions such as page loading or button clicks generate requests that are sent to the PHP backend. The backend processes these requests, communicates with the MySQL database to retrieve relevant product and rental data, and sends structured responses back to the frontend in JSON or HTML format. JavaScript then dynamically updates the user interface to display available gadgets and rental options. The workflow also includes secure user authentication, product selection, rental duration selection, and booking tracking, ensuring a smooth and interactive user experience from start to end.


## Project Demo

### Video
https://drive.google.com/file/d/1hlwevm4Nq-a4maWujn4FqpR3f1jRqBo4/view?usp=drive_link

This video demonstrates the end-to-end functionality of ZapRent, a tech rental platform designed with a streamlined user interface and a real-time order tracking system.

### 1. User Flow: From Browsing to Rental
The video follows a logical flow through three distinct user roles:

- Customer Role:

Login & Browsing: The user, arya@gmail.com, logs in to view a grid of high-end tech products like Sony headphones and Razer laptops.

Dynamic Selection: Clicking "Add to Order" updates a sticky summary bar at the top, showing the item count and total daily rental price in real-time.

Checkout & Progress: After entering delivery details, a persistent status bar appears at the bottom with a pulsing green dot, indicating "Order Request Received."

- Delivery Role:

Fleet Management: A delivery partner logs in to a dedicated dashboard.

Task Updates: They view "Consolidated Tasks" and use a dropdown menu to update the status from "Order Request Received" to "On the Way" or "Delivered."

- Admin Role:

Full Oversight: The admin logs in to a high-level view of all requests, tracking the progress of various orders across the platform.

### 2. Key Features
The demonstration highlights several interactive features that enhance the UX:

Persistent Status Bar: A "vanishing" UI element for the customer that tracks order progress and disappears once delivery is complete.

Selection Summary Bar: A dynamic bar that provides immediate feedback on total costs as the user selects multiple tech items.

Fleet Assignment Logic: A backend system that allows delivery partners to "pick up" specific tasks, preventing fleet conflicts.

### 3. Technical Highlights
Real-Time Feedback: The use of CSS animations (the pulsing dot) and JavaScript (dynamic price calculations) creates a responsive "app-like" feel.

Database Connectivity: The video shows how actions in the delivery dashboard (changing a status) immediately update the customer's view and the admin's master list.

Professional UI/UX: The interface uses a clean, modern aesthetic with consistent branding, centered logos, and high-quality product imagery.


## AI Tools Used (Optional - For Transparency Bonus)

**Tool Used:** ChatGPT, Gemini

**Purpose:** 
- Designed a dynamic PHP product catalog with a switch-case image mapping system.
- Developed a "vanishing" real-time order status bar with CSS pulse animations.
  
**Key Prompts Used:**
- "Adjust the size I want the animation to work and tell change in the table"
- "Give full php code remove headphones"
- "I want zaprent in the middle and gmail in the right side"

**Percentage of AI-generated code:** Approximately 70%

**Human Contributions:**

- Concept ideation and problem identification for ZapRent
- System architecture design and project planning
- Database schema design (Users, Orders, Products tables)
- Implementation of core business logic (rental duration, pricing calculation, availability management)
- Backend integration using PHP and MySQL
- Testing, debugging, and final deployment


## Team Contributions

- Balasoorya D A : Frontend development using HTML, CSS, and JavaScript; UI design and responsiveness; integration of frontend with PHP backend; testing and debugging.
- Aathira A S : Backend development using PHP; MySQL database design and management; authentication logic implementation; admin and delivery module development; deployment on InfinityFree.


Made with ❤️ at TinkerHub
