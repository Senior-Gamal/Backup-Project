# Backup Manager – Full Project Specification

## Overview

A Laravel-based system for organizing and scheduling server backups across different server environments. This system is **organizational only** – it does **not** execute real backups. Built specifically for **shared hosting (cPanel)** without any need for Node.js, npm, or Vite.

## Core Functionalities

* Schedule internal, external, database, and NAS backups
* Assign specific backup servers for each backup type
* Manage and track backup settings per server
* Group licenses and assign to servers
* Role-based user access: **admin**, **manager**, **viewer**
* Restrict actions (add/edit/delete) based on user role

## Data Models

### clients_servers

* Hostname
* IP Address
* DNS / NameServer *(selectable)*
* Server Type *(e.g., VPS, Dedicated, Core Linux)*
* VNC User/Password *(hidden)*
* Control Panel *(selectable)*
* License Group *(FK, selectable)*
* License *(FK, selectable)*
* Disk Space
* Connection Speed *(e.g., 100Mbps, 1Gbps)*
* Timezone *(selectable from global list)*
* Internal Backup Enabled *(status)* + Schedule *(unique time)*
* External Backup Compressed *(status)* + Schedule *(unique time)*
* Full Backup Server *(FK)*
* Full Backup Credentials *(username/password)*
* Incremental Backup Server + Schedule *(unique time)*
* DB Backup Server + Schedule *(unique time)*
* NAS Sync Schedule *(unique time)* + Credentials
* Backup System Type/Version *(selectable)*
* Secret Code
* Node Group *(selectable)*
* Datacenter *(selectable)*
* Client Number
* Notes
* Last Data Update *(timestamp)*

### backup_servers

* Server ID *(FK)*
* Backup Type *(Full, Incremental, DB, NAS)*
* Backup Server ID *(FK)*
* Username / Password
* Schedule Day *(1–31)*
* Schedule Hour *(0–23)*
* Timezone

### licenses

* Name
* License Key
* Provider
* Type
* Status
* Description

### users

* Name
* Email
* Password
* Role *(admin, manager, viewer)*

## Pages Overview

### Login/Register

* Laravel UI with password reset

### Dashboard `/dashboard`

* Widgets: Total Servers, Backup Servers, Users

### Clients Servers `/clients_servers`

* Table with all server attributes (see model above)
* Actions: **Edit**, **Delete**
* Must have **Add** button

### Create/Edit Server

* Same form for both create/edit
* All fields from `clients_servers`
* Use dropdowns for FK fields, avoid duplicate backup times where specified

### Backup Servers `/backup-servers`

* List view
* Fields: Hostname, IP, Timezone, Credentials, Backup Type
* Actions: **Add**, **Edit**, **Delete**

### Backup Assignments `/server-backups`

* Assign backups to servers
* Fields: Server, Backup Type, Server, Credentials, Day, Hour, Timezone
* Actions: **Add**, **Edit**, **Delete**

### Licenses `/licenses`, License Groups `/license-groups`

* Full CRUD

### Users `/users`

* List users with Role
* Actions: **Edit Role**, **Delete** *(admin only)*

## Roles and Permissions

| Role    | Permissions                  |
| ------- | ---------------------------- |
| Admin   | Full CRUD access             |
| Manager | Create/Edit only (no delete) |
| Viewer  | View-only access             |

## Deployment Notes

* Blade + Bootstrap 5 CDN only
* No npm, Vite, or Node
* Use Laravel Seeder:

```php
\App\Models\User::create([
  'name' => 'Admin',
  'email' => 'admin@example.com',
  'password' => bcrypt('admin123'),
  'role' => 'admin'
]);
```

* Default timezone: UTC
* Each server can have its own timezone *(selectable)*

