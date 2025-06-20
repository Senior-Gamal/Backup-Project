# Backup Manager – Full Project Specification

## Overview

A Laravel-based system for organizing and scheduling server backups across different server environments. This system is organizational only – it does not execute real backups. It targets shared hosting (cPanel) without Node.js, npm, or Vite.

## Core Functionalities

- Schedule internal, external, database, and NAS backups
- Assign specific backup servers for each backup type
- Manage and track backup settings per server
- Group licenses and assign to servers
- Role-based user access: admin, manager, viewer, custom roles
- Restrict actions (add/edit/delete/view) based on user role
- Assign users to specific servers or clients for granular access
- Highlight used backup times across servers to avoid time conflicts

## Dashboard

- General statistics overview (total servers, backups scheduled, licenses used, etc.)
- Visual indicators for upcoming backups and time conflicts

## Menu Structure

- Dashboard (الرئيسية)
- Client Servers (سيرفرات العملاء)
- Backup Servers (سيرفرات الباك اب)
- Licenses (التراخيص)
- Users (المستخدمين)
- Roles & Permissions (الصلاحيات)
- Server Settings (اعدادات السيرفرات)
- System Settings (الاعدادات)

## Backup Servers Page (سيرفرات الباك اب)

### Table View

- Server ID (id السيرفر)
- Server Name (اسم السيرفر)
- IP Address (ip السيرفر)
- Assigned Group (تابع لاي مجموعه)
- Assigned Client (تابع لاي عميل)
- Add Server button

### Server Form Fields

- Hostname – text
- IP Address – text
- DNS / NameServer – text
- Disk Space – text
- Connection Speed – text
- Timezone – select (all global timezones)
- VNC User – text
- Control Panel – optional select (from Server Settings)
- License Group – optional select (from Licenses)
- License – optional select (from Licenses)
- Internal Backup Enabled – optional select (from Server Settings)
- External Backup Compressed – schedule config (daily/weekly/monthly/specific day), time slot selector (highlight used times)
- Full Backup Server – schedule config + time slot selector
- Full Backup Credentials – schedule config + time slot selector
- DB Backup Server – schedule config + time slot selector
- NAS Sync Schedule – schedule config + time slot selector
- Backup System Type – optional select (from Server Settings)
- Secret Code – text
- Node Group – optional select (from Server Settings)
- Datacenter – optional select (from Server Settings)
- Client Number – text
- Notes – text
- Last Data Update – date picker

## Client Servers Page (سيرفرات العملاء)

### Table View

- Server Name
- IP Address
- Assigned Client
- License Info
- Status
- Add/Edit/Delete options based on user role

### Form Fields

- Server Name – text
- IP Address – text
- Assigned Client – select
- License Group – optional select
- License – optional select
- Backup Settings: similar to Backup Servers (time slots, with conflict-highlighting)
- Notes – text

## Licenses Page (التراخيص)

### Table View

- License Key
- License Group
- Type
- Status (active/expired)
- Assigned Server

### Form Fields

- License Key – text
- License Group – select
- Type – select (e.g. cPanel, DirectAdmin, Plesk)
- Status – toggle
- Notes – text

## Users Page (المستخدمين)

### Table View

- Name
- Email
- Role
- Assigned Servers/Clients
- Status

### Form Fields

- Name – text
- Email – text
- Password – password
- Role – select (admin, manager, viewer, custom roles)
- Assign Servers – multi-select
- Assign Clients – multi-select
- Status – toggle

## Roles & Permissions Page (الصلاحيات)

### Table View

- Role Name
- Description
- Permissions Summary

### Form Fields

- Role Name – text
- Description – text
- Permissions Matrix
  - View Servers
  - Add/Edit Servers
  - Delete Servers
  - View/Edit Licenses
  - Manage Users
  - Manage Roles
  - Access Settings
  - View Dashboard Statistics

## Server Settings Page (اعدادات السيرفرات)

- Define available control panels
- Define node groups
- Define backup system types
- Timezone list management

## System Settings Page (الاعدادات)

- General system configurations
- Branding settings
- Notification preferences
- Backup interval defaults

## To Do

- Implement Role-Based Access Control (RBAC)
- Add validation and dynamic selection logic
- Time-slot conflict highlighter for backup scheduling
- Assign users to specific servers/clients
- Design clean and responsive UI

