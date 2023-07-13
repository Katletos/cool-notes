# cool-notes
## About
It is notes web app 
- tailwind ui
- registration and authorization
- sessions
- database
- MVC
## How to launch
Setup `mysql/mariadb` and edit `Core/Database.php`, `config.php` before launch. 
```sql
create table notes
(
    id    int auto_increment
        primary key,
    title varchar(255)  not null,
    body  varchar(1024) null
);
```
```sql
create table users
(
    id       bigint unsigned auto_increment
        primary key,
    username varchar(100)         not null,
    admin    tinyint(2) default 0 not null,
    constraint id
        unique (id)
);
```

Execute this command to set up document root
```
php -S hostname:port -t public 
```

