<?php
Breadcrumbs::register('home', function ($breadcrumbs) {
     $breadcrumbs->push('Home', route('froentend.home'));
});

Breadcrumbs::register('category', function ($breadcrumbs, $category) {
     $breadcrumbs->push($category->name, route('frontend.cat.products', [$category->slug]));
});

Breadcrumbs::register('department', function ($breadcrumbs, $department) {
	$breadcrumbs->parent('home');
     $breadcrumbs->push($department, route('all.department.products'));
});

Breadcrumbs::register('contactus', function ($breadcrumbs, $continent) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($continent, route('frontend.contactus', ['name' => $continent]));
});

Breadcrumbs::register('sale', function ($breadcrumbs, $continent) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($continent, route('frontend.sale', ['name' => $continent]));
});
Breadcrumbs::register('loacation', function ($breadcrumbs, $continent) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($continent, route('froentend.stores'));
});

Breadcrumbs::register('newarrivals', function ($breadcrumbs, $continent) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($continent, route('frontend.newarrivals', ['name' => $continent]));
});

Breadcrumbs::register('categorypage', function ($breadcrumbs, $continent) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($continent, route('frontend.cat.products', ['name' => $continent[0]->name]));
});




Breadcrumbs::register('singlproduct', function ($breadcrumbs, $continent, $category) {
    $breadcrumbs->parent('home', $continent);
	$breadcrumbs->parent('category', $category);	
    $breadcrumbs->push($continent, route('frontend.single.product', ['name' => $continent]));
});

Breadcrumbs::register('single_category', function ($breadcrumbs, $continent, $category) {
    $breadcrumbs->parent('home', $continent);		
    $breadcrumbs->push($continent, route('frontend.single.product', ['name' => $category->name]));
});