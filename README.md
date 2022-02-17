# Guest Post 

Contributors: coricsdev<br>
Tags: Custom Plugin, Front End Submission, Author Post, Custom Post Type<br>
Requires PHP: 5.6<br>
Tested up to: 5.1.10<br>
Stable tag: 1.0.0<br>
License: GPLv2 or later<br>
License URI: http://www.gnu.org/licenses/gpl-2.0.html


This exercise is about creating an interface in Front-end site of website, so that guest authors can submit posts from front-side.


## Description

Using this interface, the guest author should be able to create
a post from front side. You can create another page where all the posts created by this author will be listed.


## Features

* Supports Post Title, Post Description, Excerpt and Featured Image fields
* Easily add a guest post form to any post or page via short code.
* Show the list of posts which are in pending status for admin approve.
* After add new post admin can get notification mail.


## Demo
- Demo URL: 
- Add guest post page: 
- List guest post page: 

## Multidots Login

### login credentials
##### Administrator user
- Login URL: 
- User name: 
- Password:


##### Author role user
- Login URL: 
- User name: 
- Password:  

## Installation

1. Upload the `guest-post` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

## Shortcode

1. Add Guest post form shortcode `[gp_add_post /]` 
2. Show the list of posts which are in pending status for admin approval shortcode `[gp_view_posts /]` 

## Usage Examples 

 After active plugin, you should create a new user from wp-admin dashboard with **Author role** or also you can use exist **author role** user's.

1. If user with <b>author role</b> not exist then go to wp-admin dashboard and create new user with author role.
2. For add custom post type form go to wp-admin `dashboard` &#8594; `page` &#8594; `new page` or use existing page and add `[gp_add_post /]` in post editor or  gutenberg shortcode block. 
4. Show the list of posts which are in pending status for admin approval showing go to wp-admin `dashboard` &#8594; `page` &#8594; `new page` or use existing page and add `[gp_view_post /]` in post editor or  Gutenberg shortcode block.


## Frequently Asked Questions


## Screenshots


* ### Add guest post form
![GitHub Logo]()

* ### Pending status for admin approval post list
![GitHub Logo]()

* ### WP-CLI screen
![GitHub Logo]()


## Change log

## 1.0.0
* Initial Release