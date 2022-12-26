<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
//    return view('dashboard');
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//admin routes....
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    //Admin login route.....
    Route::match(['get','post'],'/login',[AdminController::class,'login'])->name('admin.login');

     //Admin && Vendor dashboard route....
    Route::group(['middleware'=>['admin']], function(){

        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

        //update admin password...
        Route::match(['get','post'],'/update/password',[AdminController::class,'updateAdminPassword'])->name('update.admin.password');
        Route::post('/check-current-password',[AdminController::class,'checkAdminPassword']);

        //update admin details.....
        Route::match(['get','post'],'/update/details',[AdminController::class,'updateAdminDetails'])->name('update.admin.details');

        //Admin logout route....
        Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');

        //update Vendor Details....
        Route::match(['get','post'],'/update/vendor/details/{slug}',[AdminController::class,'updateVendorDetails'])->name('update.vendor.details');

        //View vendor details....
        Route::get('/view/vendor/details/{id}',[AdminController::class,'viewVendorDetails'])->name('view.vendor.details');

        //View admins/sub admins/vendors....
        Route::get('admins/{type?}',[AdminController::class,'admins']);

        //update admin status...
        Route::post('/update-admin-status',[AdminController::class,'updateAdminStatus'])->name('update-admin-status');

        //sections....
        Route::get('sections',[\App\Http\Controllers\Admin\SectionController::class,'sections'])->name('admin.sections');


        //Update section status...
        Route::post('/update-section-status',[\App\Http\Controllers\Admin\SectionController::class,'updateSectionStatus'])->name('update-section-status');
        Route::get('delete/section/{id}',[\App\Http\Controllers\Admin\SectionController::class,'deleteSection'])->name('delete-section');
        Route::match(['get','post'],'add-edit-section/{id?}',[\App\Http\Controllers\Admin\SectionController::class,'addEditSection'])->name('add-edit-section');

        //Categories....
        Route::get('categories',[\App\Http\Controllers\Admin\CategoryController::class,'categories'])->name('categories');


        //update category status...
        Route::post('/update-category-status',[\App\Http\Controllers\Admin\CategoryController::class,'updateCategoryStatus'])->name('update-category-status');
        Route::match(['get','post'],'add-edit-category/{id?}',[\App\Http\Controllers\Admin\CategoryController::class,'addEditCategory'])->name('add-edit-category');
        //append category route...
        Route::get('/append-categories-level',[\App\Http\Controllers\Admin\CategoryController::class,'appendCategoryLevel'])->name('append-categories-level');
        Route::get('/delete/category/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'deleteCategory'])->name('delete-category');
        Route::get('/delete-category-image/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'deleteCategoryImage'])->name('delete-category-image');

        //brands.......
        Route::get('brands',[\App\Http\Controllers\Admin\BrandController::class,'brands'])->name('brands');

        //update brand status...
        Route::post('/update-brand-status',[\App\Http\Controllers\Admin\BrandController::class,'updateBrandStatus'])->name('update-brand-status');
        Route::match(['get','post'],'add-edit-brand/{id?}',[\App\Http\Controllers\Admin\BrandController::class,'addEditBrand'])->name('add-edit-brand');


        //append brand route...
        Route::get('/append-brands-level',[\App\Http\Controllers\Admin\BrandController::class,'appendBrandLevel'])->name('append-brands-level');
        Route::get('/delete/brand/{id}',[\App\Http\Controllers\Admin\BrandController::class,'deleteBrand'])->name('delete-brand');
        Route::get('/delete-brand-image/{id}',[\App\Http\Controllers\Admin\BrandController::class,'deleteBrandImage'])->name('delete-brand-image');

        //products.........
        Route::get('products',[\App\Http\Controllers\Admin\ProductController::class,'products'])->name('products');
        Route::post('/update-product-status',[\App\Http\Controllers\Admin\ProductController::class,'updateProductStatus'])->name('update-product-status');
        Route::match(['get','post'],'add-edit-product/{id?}',[\App\Http\Controllers\Admin\ProductController::class,'addEditProduct'])->name('add-edit-product');
        Route::get('/delete/product/{id}',[\App\Http\Controllers\Admin\ProductController::class,'deleteProduct'])->name('delete-product');
        Route::get('/delete-product-image/{id}',[\App\Http\Controllers\Admin\ProductController::class,'deleteProductImage'])->name('delete-product-image');
        Route::get('/delete-product-video/{id}',[\App\Http\Controllers\Admin\ProductController::class,'deleteProductVideo'])->name('delete-product-video');


        //products attribute....
        Route::match(['get','post'],'/add-edit-attribute/{id}',[\App\Http\Controllers\Admin\ProductController::class,'addEditAttribute'])->name('add-edit-attribute');
        Route::post('/update-product-attribute-status',[\App\Http\Controllers\Admin\ProductController::class,'updateProductAttributeStatus'])->name('update-product-attribute-status');
        Route::get('/delete-product-attribute/{id}',[\App\Http\Controllers\Admin\ProductController::class,'deleteProductAttribute'])->name('delete-product-attribute');
        Route::match(['get','post'],'/edit-product-attribute/{id?}',[\App\Http\Controllers\Admin\ProductController::class,'editProductAttribute'])->name('edit-product-attribute');


        //Images....
        Route::match(['get','post'],'/add-images/{id}',[\App\Http\Controllers\Admin\ProductController::class,'addImages'])->name('add-images');
        Route::post('/update-product-image-status',[\App\Http\Controllers\Admin\ProductController::class,'updateProductImageStatus'])->name('update-product-image-status');
        Route::get('/delete_product_multiple_image/{id}',[\App\Http\Controllers\Admin\ProductController::class,'deleteProductMultipleImage'])->name('delete_product_multiple_image');

        //Banner.........
        Route::controller(BannerController::class)->prefix('banner')->group(function(){
            Route::get('slider','sliderBanner')->name('slider_banner');
            Route::get('add','addBanner')->name('add_banner');
            Route::post('save','saveBanner')->name('save_banner');
            Route::get('edit/{id}','editBanner')->name('edit_banner');
            Route::post('update/{id}','updateBanner')->name('update_banner');
            Route::get('delete/{id}','deleteBanner')->name('delete_banner');
            Route::post('update-status','updateBannerStatus')->name('update-banner-status');
        });
    });

});

//frontend routes.........
Route::namespace('App\Http\Controllers\Front')->group(function(){
    Route::get('/','FrontController@index');
    $categoryUrls = Category::select('url')->where('status',1)->get()->pluck('url');
    foreach ($categoryUrls as $url)
    {
        Route::get('/'.$url,'ProductController@listing');
    }
});



