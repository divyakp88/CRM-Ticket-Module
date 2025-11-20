# CRM Ticket Module

A simple CRM (Customer Relationship Management) Ticket Module built using **PHP** and **MySQL**, with role-based access for **Admin**, **Author**, and **Assignee**.

---

## Tech Stack

The CRM project is built using the following technologies:

- **Frontend:** HTML, CSS
- **Backend:** PHP 
- **Database:** MySQL  
- **Server Environment:** WAMP Server (Windows, Apache, MySQL, PHP)  
- **Version Control:** Git (for managing project code)  
- **File Uploads:** Handled via PHP to `uploads/` directory  
- **Session Management:** PHP sessions for user authentication and role-based access 


## ⚙️ Features

- **Admin**
  - View, edit, and reassign tickets
  - Manage users
  - Dashboard with ticket statistics

- **Author**
  - Create and manage tickets
  - Assign tickets to assignees

- **Assignee**
  - View tickets assigned to them
  - Update ticket status

- **File Upload**
  - Optional file attachments for tickets

- **Role-based Access**
  - Admin, Author, and Assignee roles with separate dashboards

---


## 🛠 Installation Manual


1. **Install WAMP Server**  
Download and install WAMP Server
Clone the repository:
```bash
git clone <https://github.com/divyakp88/CRM-Ticket-Module>
```
2. **Create Database**  
   - Open `phpMyAdmin`
   - Create a new database named `crm_db`
3. **Configure Database**  
   - Open `config/db.php`  
   - Update the database credentials as per your WAMP setup:
     
4. **Copy Project to WAMP www Directory**
   - Copy the crm_project folder to `C:\wamp64\www\`
   
6. **Run the Project**
   - Open your browser and navigate to:
     http://localhost/crm_project/index.php
   - Login with your credentials to start using the CRM.
     
## 📂 Project Structure
<pre>```crm_project/
│
├─ admin/
│ ├─ index.php
│ ├─ admin_auth.php
│ ├─ admin_edit_ticket.php
│ ├─ dashboard_content.php
│ ├─ manage_ticket.php
│ ├─ update_ticket_admin.php
│ └─ users.php
| |__css
|   |__style.css  

│
├─ assets/
│ ├─ css/
│ │ └─ style.css
│ 
│
├─ auth/
│ ├─ login.php
│ ├─ register.php
│ └─ logout.php
│
├─ config/
│ └─ db.php
│
├─ dashboard/
│ └─ index.php (author/assignee dashboard)
│
├─ tickets/
│ ├─ create_ticket.php
│ ├─ my_tickets.php
│ ├─ update_status.php
│ ├─ update_ticket.php
│ └─ view_assigned_tickets.php
│
├─ uploads/ (user uploaded files)
└─ index.php (main landing page)```</pre>


