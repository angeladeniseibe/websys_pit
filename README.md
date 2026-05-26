# DreamHome – Online Rental Property Management System
**IT212 – Web Systems and Technology + Database Systems | Final Project**

A Laravel-based web application that allows clients to view and avail rental properties online, integrated with a PostgreSQL database following the DreamHome Case Study across 10 Philippine branches.

<<<<<<< HEAD
## Project Description
|A project that shows and deploy a Website where clients can avail rental properties online|


## Team Members

| Name		 	| Module |
|----------------------	|--------|
|Jo Lucero		| 1	 |
|Vincent S. Calimutan	| 2 	 |
|Angela Denise Ibe 	| 3 	 |
|Aldren O Restauro	| 4 	 |
=======
>>>>>>> origin/Aldren_module3
---

## Team Members & Module Assignments

| Module | Assigned Developer     |
|--------|------------------------|
| 1      | Jo Nathaniel Lucero    |
| 2      | Vincent S. Calimutan   |
| 3      | Angela Denise Ibe      |
| 4      | Aldren O. Restauro     |

> Each member is responsible for developing, committing, and explaining their own module during the defense.

---

## Repository Link

🔗 https://github.com/angeladeniseibe/websys_pit.git

---

## Deployed System

🌐 [https://your-project-url.railway.app](https://your-project-url.railway.app)

> Hosted on **Railway** (PostgreSQL + Laravel)

---

## Tech Stack

| Layer      | Technology              |
|------------|-------------------------|
| Backend    | Laravel (PHP)           |
| Database   | PostgreSQL (Railway)    |
| Frontend   | Bootstrap / Tailwind CSS |
| Deployment | Railway                 |
| Version Control | GitHub / GitLab   |

---

## User Roles & Access

| Role           | Access                                                        |
|----------------|---------------------------------------------------------------|
| **Admin**      | Full CRUD – manage all records across all modules             |
| **Manager**    | View branch and staff records under their branch              |
| **Supervisor** | View and manage their assigned staff group                    |
| **Secretary**  | Limited access to records relevant to their tasks             |
| **Staff**      | View-only access to their own profile                         |

> Admin is the only role with full CRUD permissions.

---

## Setup Instructions

### Requirements
- PHP 8.1+
- Composer
- Node.js & npm
- PostgreSQL 14+
- Railway account (for deployment)

### Installation

**1. Clone the repository**
```bash
git clone https://github.com/your-project
cd your-project-folder
```

**2. Install dependencies**
```bash
composer install
npm install
```

**3. Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Update `.env` with your database credentials**
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=dreamhome
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

**5. Run migrations**
```bash
php artisan migrate --seed
```

**6. Start the development server**
```bash
npm run dev
php artisan serve
```

---
 

         
## Default Login

Admin Account
email = admin@test.com
password  = 12345678

Manager Account
email = manager@test.com
password  = 12345678

Staff Account
email = staff@test.com
password  = '12345678'

supervisor Account
email = supervisor@test.com
password  =12345678

secretary Account
email = secretary@test.com
password  =12345678

Staff Account
email = staff@test.com
password  =12345678

---

## Database Information

### Platform
Railway PostgreSQL

### Main Tables

| Table          | Purpose                              |
|----------------|--------------------------------------|
| `users`        | Authentication and role management   |
| `branch`       | 10 DreamHome branches (Philippines)  |
| `Staff`        | All staff records per branch         |
| `Manager`      | Manager subtype (allowance, bonus)   |
| `Supervisor`   | Supervisor subtype (manager link)    |
| `Secretary`    | Secretary subtype (typing speed)     |
| `Next_of_kin`  | Emergency contact per staff          |
| client	       | basic data for client		            |
| registration	 |record for client registration	      |

### Branches Covered

| Branch | City                  |
|--------|-----------------------|
| B001   | Cagayan de Oro        |
| B002   | Davao City            |
| B003   | Zamboanga City        |
| B004   | Iligan City           |
| B005   | General Santos        |
| B006   | Butuan City           |
| B007   | Cagayan de Oro (Cogon)|
| B008   | Cebu City             |
| B009   | Iloilo City           |
| B010   | Bacolod City          |

---

## Database Features (Module 3 – Angela Denise Ibe)

### Views
- `vw_staff_branch` – Staff with branch details
- `vw_manager_compensation` – Salary + allowance + bonus
- `vw_supervisor_group` – Supervisor with group size count
- `vw_supervisors_per_branch` – Supervisors per branch
- `vw_secretary_details` – Secretary with typing speed
- `vw_branch_summary` – Branch headcount by position
-`view_client_registrations` – Displays client information with their registration details
-`view_branch_registration_count` – Shows total number of registrations per branch
-`view_high_budget_clients` – Lists clients with high rental budget (≥ 10,000)

### Triggers

| Trigger                        | Description                                          |
|-------------------------------|------------------------------------------------------|
| `trg_1_mandatory_reporting`   | Staff/Secretary must be assigned to a supervisor     |
| `trg_2_reporting_roles_check` | Only Supervisors can be assigned as supervisor_no    |
| `trg_3_supervisor_same_branch`| Supervisor must be in the same branch as staff       |
| `trg_4_one_manager_per_branch`| Only one Manager allowed per branch                  |
| `trg_5_supervisor_size_insert/delete` | Supervisor group must have 5–10 members      |
| `trg_6_supervisor_manager_role` | manager_no must reference a valid Manager in same branch |
| ` trg_check_duplicate_phone`     |Prevents duplicate phone numbers in the Client table|

### Stored Procedures
- `sp_add_staff` – Add a new staff member
- `sp_transfer_staff` – Transfer staff to another branch
- `sp_update_manager_compensation` – Update car allowance and bonus
- `add_client` – Inserts a new client record
- `add_registration` – Adds a new registration for a client

### Functions
- `fn_branch_staff_count(branch_no)` – Count staff in a branch
- `fn_supervisor_group_size(supervisor_id)` – Count staff under a supervisor
- `fn_manager_total_compensation(staff_id)` – Calculate total annual pay of a manager
-`count_registrations_by_branch(branch_no)` – Returns total registrations per branch
-`total_clients()` – Returns total number of clients
-`get_client_fullname(client_id)` – Returns full name of a client
-`avg_max_rent(branch_no)` – Returns average preferred rent per branch

### Transaction & Concurrency Control
- `BEGIN` / `COMMIT` / `ROLLBACK` blocks
- `SAVEPOINT` with rollback examples
- `SELECT FOR UPDATE` (pessimistic locking)
- Isolation levels: `REPEATABLE READ` and `SERIALIZABLE`
- Deadlock prevention via consistent row ordering

### Query Optimization
- Indexes on `branch_no`, `supervisor_no`, `position`, `staff_id`, `manager_no`
- `EXPLAIN ANALYZE` on key views and queries

---

## Repository Structure

```
project-system/
├── app/
├── database/
├── resources/views/
├── routes/
├── public/
├── modules/
└── README.md
```

---

## Branching Strategy

| Branch                 | Purpose                          |
|------------------------|----------------------------------|
| `main`                 | Final stable system              |
| `dev`                  | Integration and testing          |
| `feature-module-1`     | Jo Nathaniel – Module 1          |
| `feature-module-2`     | Vincent – Module 2               |
| `feature-module-3`     | Angela – Staff & Branch (DB)     |
| `feature-module-4`     | Aldren – Module 4                |

---

## Deployment (Railway)

1. Create a new Railway project
2. Add a **PostgreSQL** plugin
3. Copy the Railway connection string into your environment variables:
```env
DB_CONNECTION=pgsql
DB_HOST=<railway-host>
DB_PORT=5432
DB_DATABASE=<railway-db>
DB_USERNAME=<railway-user>
DB_PASSWORD=<railway-password>
```
4. Run migrations via Railway console or connected client
5. Deploy the Laravel source code via GitHub integration

---

## Screenshots

Required screenshots:
- Login Page ![alt text](login_page.png)
- Dashboard ![alt text](dashboard.png)
- CRUD Module
(Client Registration)
Create ![alt text](registration_create.png)
Read and Delete ![alt text](read&delete.png)
Update ![alt text](update_registration.png)


- PostgreSQL Database Tables
> Drag and drop images into the GitHub README editor to upload them automatically.



---

## Notes

- `manager_no` was moved from the `Staff` table to the `Supervisor` subtype to follow proper normalization.
- Supervisor group size is enforced at a minimum of 5 and maximum of 10 members via trigger.
- All foreign key constraints on subtypes use `ON DELETE CASCADE`.
- Admin account must be seeded manually or via `php artisan db:seed` before first login.
