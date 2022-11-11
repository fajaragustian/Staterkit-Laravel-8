<?php // routes/breadcrumbs.php

use App\Models\User;

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('home'));
});

// User
// Home > Users Management
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Users Management', route('users.index'));
});
// Home > Users Management
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Add Users Management', route('users.create'));
});
// Home > Users Management > Show
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.show', $user->id));
});
// Home > Users Management > Edit
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.edit', $user->id));
});

// Role
// Home > Roles Management
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Roles Management', route('roles.index'));
});
// Home > Roles Management
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Add Roles Management', route('roles.create'));
});
// Home > Roles Management > Show
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles.index');
    $trail->push($role->name, route('roles.show', $role->id));
});
// Home > Roles Management > Edit
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles.index');
    $trail->push($role->name, route('roles.edit', $role->id));
});

// Permission
// Home > Permission Management
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Permission Management', route('permissions.index'));
});
// Home > Permission Management
Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push('Add Permission Management', route('permissions.create'));
});
// Home > Permission Management > Show
Breadcrumbs::for('permissions.show', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('permissions.index');
    $trail->push($permission->name, route('permissions.show', $permission->id));
});
// Home > Permission Management > Edit
Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('permissions.index');
    $trail->push($permission->name, route('permissions.edit', $permission->id));
});
// Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Edit Profile', route('profile'));
});
// Change Password
Breadcrumbs::for('password', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Change Password', route('password'));
});
