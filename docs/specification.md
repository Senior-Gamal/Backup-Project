# Backup Manager – Full Project Specification

## Overview
A Laravel-based system to manage and schedule server backups between various environments. The system is organizational only, recording and tracking backups without performing them. Designed for shared hosting without Node/npm.

## Core Functionalities
- Manage physical and virtual servers
- Schedule internal and external backups
- Assign backup servers per type (Full, Incremental, DB, NAS)
- Track backup configuration per server
- Group licenses and assign them
- Create user accounts with roles: admin, manager, viewer
- Access control based on user role

## Data Models
### servers
| Field | Type | Description |
|-------|------|-------------|
| hostname | string | Server hostname |
| ip_address | string | Server IP |
| dns | string | DNS / NameServer |
| vnc_user/password | string | VNC credentials |
| control_panel | string | cPanel, VistaPanel, etc. |
| license_id | FK | Assigned license |
| license_group_id | FK | Group of licenses |
| disk_space | integer | Available disk space in GB |
| connection_speed | string | e.g., 100Mbps, 1Gbps |
| timezone | string | Server timezone |
| internal_backup_enabled | boolean | Is internal backup active? |
| internal_backup_time | time | Scheduled time |
| external_backup_compressed | boolean | Enable full external backup |
| full_backup_time | time | Schedule |
| external_backup_server | FK | Assigned backup server |
| external_backup_username/password | string | Full backup credentials |
| incremental_time | time | Schedule |
| incremental_backup_server | FK | Assigned incremental backup server |
| db_backup_time | time | Schedule |
| db_backup_server | FK | Assigned DB backup server |
| nas_schedule | time | Time for NAS sync |
| nas_user/password | string | NAS credentials |
| backup_system_type | string | e.g., JetBackup, R1Soft |
| backup_system_version | string | Version number |
| backup_secret_code | string | Secret ID/code |
| node_group | string | Group this server belongs to |
| datacenter | string | Data center name |
| client_number | string | Internal client reference |
| notes | text | Optional notes |
| last_data_update_at | timestamp | Last update date |

### clients_servers (backup servers)
- name
- ip_address
- type (Full, Incremental, DB, NAS)
- timezone
- username/password

### server_backups
- server_id
- backup_type
- backup_server_id
- username/password
- schedule_day
- schedule_hour
- timezone

### licenses
- name
- license_key
- provider
- type
- status

### license_groups
- name
- description

### users
- name
- email
- password
- role

## Pages Overview
### Login/Register
- Laravel UI based authentication with password reset

### Dashboard
- Widgets for total servers, backup servers, and users

### Servers
- List view with all server attributes and actions to edit/delete

### Create/Edit Server
- Form with fields for all server details

### Clients' Backup Servers
- CRUD for backup servers

### Assign Backups
- Manage relationships between servers and backup servers

### Licenses & License Groups
- CRUD interfaces

### Users
- Manage user accounts and roles

## Role Permissions
| Role | Description | Permissions |
|------|-------------|-------------|
| Admin | Full Access | Manage everything |
| Manager | Team Manager | Can create/edit, not delete users |
| Viewer | Read-Only | View data only |

## Deployment Notes
- Bootstrap 5 via CDN
- Blade templates only
- Seeder creates default admin user
- Default timezone UTC
- Each server has selectable timezone
