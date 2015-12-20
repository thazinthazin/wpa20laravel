<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
$breadcrumbs->push('Home', route('home'));
});

// Home -> About
Breadcrumbs::register('about', function($breadcrumbs)
{
$breadcrumbs->parent('home');
$breadcrumbs->push('About', route('home'));
});

// Home > Contact
Breadcrumbs::register('about', function($breadcrumbs)
{
$breadcrumbs->parent('home');
$breadcrumbs->push('Contact', route('shop_contact'));
});
// Home -> Shop
Breadcrumbs::register('shop', function($breadcrumbs)
{
$breadcrumbs->parent('home');
$breadcrumbs->push('Shop', route('shop_home'));
});
// Shop > Categories
Breadcrumbs::register('categories', function($breadcrumbs)
{
$breadcrumbs->parent('shop');
$breadcrumbs->push('Brands', route('shop_categories'));
});
// Shop > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
$breadcrumbs->parent('shop');
$breadcrumbs->push($category->name, route('shop_categories_show', $category->id));
});

// Shop > [Category] > [Sub_Category]
Breadcrumbs::register('subcategory', function($breadcrumbs, $subcategory)
{

$breadcrumbs->parent('category', $subcategory->category);
$breadcrumbs->push($subcategory->sub_name, route('shop_subcategories_show', $subcategory->id));
});

// Shop > [Category] > [Sub_Category] > [Products]
Breadcrumbs::register('product_show', function($breadcrumbs, $product)
{

$breadcrumbs->parent('category', $product->category);
$breadcrumbs->push($product->title, route('shop_product_show', $product->id));
});

// Home > Customer
Breadcrumbs::register('customer', function($breadcrumbs)
{
$breadcrumbs->parent('home');
$breadcrumbs->push('My Account', route('customer.index'));
});

// Home > Customer > Cart
Breadcrumbs::register('cart', function($breadcrumbs)
{
$breadcrumbs->parent('customer');
$breadcrumbs->push('Cart', route('cart_show'));
});

// Home > Customer > Order
Breadcrumbs::register('order', function($breadcrumbs)
{
$breadcrumbs->parent('customer');
$breadcrumbs->push('Order', route('order_show'));
});

// Home > Customer > Wishlist
Breadcrumbs::register('wishlist', function($breadcrumbs)
{
$breadcrumbs->parent('customer');
$breadcrumbs->push('Wishlist', route('wishlist_show'));
});


//Admin
Breadcrumbs::register('admin_home', function($breadcrumbs)
{
$breadcrumbs->push('Admin', route('admin_home'));
});


Breadcrumbs::register('dashboard', function($breadcrumbs)
{
$breadcrumbs->parent('admin_home');
$breadcrumbs->push('Dashboard', route('admin_home'));
});

Breadcrumbs::register('upload_manager', function($breadcrumbs)
{
$breadcrumbs->parent('admin_home');
$breadcrumbs->push('Upload', route('admin_upload'));
});

Breadcrumbs::register('admin_categories', function($breadcrumbs)
{
$breadcrumbs->parent('admin_home');
$breadcrumbs->push('Categories', route('admin.categories.index'));
});

Breadcrumbs::register('admin_categories_edit', function($breadcrumbs)
{
$breadcrumbs->parent('admin_categories');
$breadcrumbs->push('Categories_Edit', route('admin.categories.edit'));
});

Breadcrumbs::register('admin_products', function($breadcrumbs)
{
$breadcrumbs->parent('admin_home');
$breadcrumbs->push('Products', route('admin.products.index'));
});

Breadcrumbs::register('admin_products_create', function($breadcrumbs)
{
$breadcrumbs->parent('admin_products');
$breadcrumbs->push('Products_Create', route('admin.products.create'));
});

Breadcrumbs::register('admin_products_edit', function($breadcrumbs)
{
$breadcrumbs->parent('admin_products');
$breadcrumbs->push('Products_Edit', route('admin.products.edit'));
});

Breadcrumbs::register('admin_users', function($breadcrumbs)
{
$breadcrumbs->parent('admin_home');
$breadcrumbs->push('Users', route('admin_user'));
});

Breadcrumbs::register('admin_orders', function($breadcrumbs)
{
$breadcrumbs->parent('admin_home');
$breadcrumbs->push('Orders', route('admin_order'));
});

Breadcrumbs::register('admin_messages', function($breadcrumbs)
{
$breadcrumbs->parent('admin_home');
$breadcrumbs->push('Messages', route('admin_message'));
});




