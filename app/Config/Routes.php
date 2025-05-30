<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('announcement', 'Pages::announcement');
$routes->get('about', 'Pages::about');
$routes->get('contact', 'Pages::contact');

//register

$routes->post('/auth/register', 'Auth::register');

//login
$routes->post('auth/login', 'Auth::login');


//dashboard routes if user or admin
$routes->get('/adminSide/dashboard', 'DashboardController::adminDashboard');
$routes->get('/userSide/dashboard', 'DashboardController::userDashboard');

//update profile
$routes->post('/auth/updateProfile', 'Auth::updateProfile');

//logout
$routes->get('/auth/logout', 'Auth::logout');


//announcement routes display
$routes->get('/pages/announcements', 'AnnouncementController::index');

//admin announcement routes
$routes->get('admin/announcements', 'AdminAnnouncement::index');
$routes->post('admin/announcements/store', 'AdminAnnouncement::store');
$routes->get('admin/announcements/delete/(:num)', 'AdminAnnouncement::delete/$1');

//admin user management routes
$routes->get('/admin/users', 'AdminUser::index');
$routes->post('/admin_user/updateRole', 'AdminUser::updateRole');
$routes->get('/admin_user/deleteUser/(:num)', 'AdminUser::deleteUser/$1');
$routes->post('/admin_user/addUser', 'AdminUser::addUser');

//social media routes

$routes->get('/social', 'SocialController::index');
$routes->post('/social/create', 'SocialController::create');

//contact form route
$routes->post('/contact/submit', 'ContactController::submit');