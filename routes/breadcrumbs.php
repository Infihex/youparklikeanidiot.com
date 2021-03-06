<?php

// Home
Breadcrumbs::for('home', function ($trail) {
     $trail->push(__('global.home'), route('home'));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push(__('auth.signin.title'), route('login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push(__('auth.signup.title'), route('register'));
});

Breadcrumbs::for('password.reset', function ($trail) {
    $trail->parent('home');
    $trail->push(__('auth.password.reset.title'), route('password.email'));
});

Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('home');
    $trail->push(__('auth.password.reset.title'), route('password.email'));
});

Breadcrumbs::for('user.show', function ($trail, $user) {
    $trail->parent('home');
    $trail->push(__('user.title'));
    $trail->push($user, route('user.show', $user));
});

Breadcrumbs::macro('pageTitle', function () {
    $title = ($breadcrumb = Breadcrumbs::current()) ? "{$breadcrumb->title} – " : '';

    if (($page = (int) request('page')) > 1) {
        $title .= "$page – ";
    }

    return $title . request()->getHttpHost();
});

Breadcrumbs::macro('resource', function ($route, $title) {
    // Home > Name
    Breadcrumbs::for($route.".index", function ($trail) use ($route, $title) {
        $trail->parent('home');
        $trail->push($title, route($route.".index"));
    });

    // Home > Name > New
    Breadcrumbs::for($route.".create", function ($trail) use ($route) {
        $trail->parent($route.".index");
        $trail->push(ucfirst(__('uri.create')), route($route.".create"));
    });

    // Home > Name > Post 123
    Breadcrumbs::for($route.".show", function ($trail, $id) use ($route) {
        $trail->parent($route.".index");
        $trail->push($id, route($route.".show", $id));
    });

    // Home > Name > Post 123 > Edit
    Breadcrumbs::for($route.".edit", function ($trail, $id) use ($route) {
        $trail->parent($route.".show", $id);
        $trail->push(ucfirst(__('uri.edit')), route($route.".edit", $id));
    });
});

Breadcrumbs::resource('parking', __('parking.title'));
Breadcrumbs::resource('info', __('info.title'));
Breadcrumbs::resource('search', __('search.title'));
Breadcrumbs::resource('licenseplate', __('licenseplate.title'));


Breadcrumbs::for('account', function ($trail) {
    $trail->parent('home');
    $trail->push(__('account.title'));
});

Breadcrumbs::for('account.password.change', function ($trail) {
    $trail->parent('account');
    $trail->push(__('account.password.change.title'), route('account.password.change'));
});

Breadcrumbs::for('account.profile.change', function ($trail) {
    $trail->parent('account');
    $trail->push(__('account.profile.change.title'), route('account.profile.change'));
});

Breadcrumbs::for('account.members', function ($trail) {
    $trail->parent('account');
    $trail->push(__('account.members.title'), route('account.members'));
});