<!-- Please update value in the {}  -->

<h1 align="center">Blog Travel</h1>

<div align="center">
  A mini project using Laravel Framework
</div>

<div align="center">
  <h3>
    <a href="https://github.com/tatranan/BlogTravel">
      Code
    </a>
  </h3>
</div>

<!-- TABLE OF CONTENTS -->

## Table of Contents

- [Overview](#overview)
    - [Built With](#built-with)
- [Install](#install)
- [Contact](#contact)

<!-- OVERVIEW -->

## Overview

- It is a blog about travel
- Website help user can share beautiful location to each other
- Work Hard, Play Hard

### Built With

<!-- This section should list any major frameworks that you built your project using. Here are a few examples.-->

- [Laravel](https://laravel.com/)
- [HTML](https://www.w3schools.com/html/)

## Install

- Clone project from [git](https://github.com/tatranan/BlogTravel.git)

    <div class="highlight">
        <pre>git clone https://github.com/tatranan/BlogTravel.git</pre>
        <pre>cd BlogTravel</pre>
    </div>

- Run Composer and NPM

    <div class="highlight">
        <pre>composer install </pre>
        <pre>npm install</pre>
    </div>

- Create database and config database

    <div class="highlight">
        <pre>cp .env.example .env</pre>
    </div>

  Edit database name and DB_user & DB_password in env.php

- Generate key

    <div class="highlight">
        <pre>php artisan key:generate</pre>
    </div>

- Migrate database

    <div class="highlight">
        <pre>php artisan migrate</pre>
    </div>

- Add data to database

    <div class="highlight">
        <pre>php artisan db:seed --class=RoleSeeder</pre>
        <pre>php artisan db:seed --class=UserSeeder</pre>
        <pre>php artisan db:seed --class=CategorySeeder</pre>
        <pre>php artisan db:seed --class=PostSeeder</pre>

    </div>

## Contact

- GitHub [tatranan](https://github.com/tatranan)
- Youtube [Drio Anden](https://www.youtube.com/channel/UC7CJBfb1bAIg6kCGmXwcoUQ/videos%25257D)
