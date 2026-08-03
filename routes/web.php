<?php

//=================Admin===============
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CareerApplicationController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExceedsExpectationsController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FeatureProjectController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HowItWorksController;
use App\Http\Controllers\Admin\IndustriesController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PrintingController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\TeamsController;
use App\Http\Controllers\Admin\TechnologiesController;
use App\Http\Controllers\Admin\TrustedPartnerController;
use App\Http\Controllers\Web\AboutController;

//=================WEB=================
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

//========================Front Route Starts Here========================
Route::get('clear', function () {
    Artisan::call('optimize:clear');

    return 'Optimization cache cleared!';
});

route::get('/', [HomeController::class, 'index'])->name('front.home');
route::get('/story', [HomeController::class, 'story'])->name('front.story');
route::get('/our-process', [HomeController::class, 'our_process'])->name('front.our_process');
route::get('/our-team', [HomeController::class, 'our_team'])->name('front.our_team');
Route::get('/captcha-image', [HomeController::class, 'showCaptcha'])->name('captcha.image');
Route::post('/verify-captcha', [HomeController::class, 'verifyCaptcha'])->name('captcha.verify');
route::post('/store-home-form', [HomeController::class, 'storeContactForm'])->name('front.contact_submit')->middleware('throttle:5,10'); //Per IP only 5 request per 10 minutes
route::post('/store-career-application', [HomeController::class, 'storeCareerApplication'])->name('front.career-application');
Route::post('/check-application-email', [HomeController::class, 'checkApplicationEmail'])->name('check.application.email');
route::get('/thankyou/', [HomeController::class, 'Thankyou'])->name('front.thank-you');
route::get('/architectural-model-making', [HomeController::class, 'architectureModel'])->name('front.architectural.model.making');
route::get('/printing', [HomeController::class, 'printing'])->name('front.printing');
route::get('/career', [HomeController::class, 'career'])->name('front.career');
route::get('/contact', [HomeController::class, 'contact'])->name('front.contact');
route::get('/our-projects', [HomeController::class, 'projects'])->name('front.projects');
Route::post('/whatsaapinquiry', [HomeController::class, 'whatsaapinquiry'])->name('whatsaapinquiry');

route::get('/3d-printing', [HomeController::class, 'printing'])->name('front.printing');
route::post('/store-inquires', [HomeController::class, 'StoreInquires'])->name('front.inquires.store')->middleware('throttle:5,1');

//ym
route::get('/architecture', [HomeController::class, 'architecture'])->name('front.architecture');
route::get('/prototyping', [HomeController::class, 'prototyping'])->name('front.prototyping');
route::get('/large-scale', [HomeController::class, 'large_scale'])->name('front.large_scale');
route::get('/terms-and-conditions', [HomeController::class, 'terms'])->name('front.terms');
route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('front.privacy');
route::get('/blogs', [HomeController::class, 'blog_listing'])->name('front.blog_listing');
route::get('/blog-detail/{url}', [HomeController::class, 'blog_detail'])->name('front.blog_detail');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('front.sitemap');

//=============================Admin Route Starts Here========================
route::middleware('guest')->group(function () {
    route::get('/register', [LoginController::class, 'register_page'])->name('register');
    route::post('/register', [LoginController::class, 'register'])->name('register');
    route::get('/login', [LoginController::class, 'login_page'])->name('login');
    route::Post('/login', [LoginController::class, 'login'])->name('login');
});

// that is access for admin and super admin;
route::middleware(['auth', 'role:admin,super_admin'])->prefix('admin')->group(function () {
    route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Our Trusted Partner
    route::get('/trusted-partner', [TrustedPartnerController::class, 'index'])->name('trustedpartner');
    Route::post('/trusted_partner_store', [TrustedPartnerController::class, 'store'])->name('trustedpartner.store');
    Route::post('/trusted-partner/update/{id}', [TrustedPartnerController::class, 'update'])->name('trustedpartner.update');
    Route::get('/trusted-partner_get_data', [TrustedPartnerController::class, 'getData'])->name('trustedpartner_get_data');
    Route::get('/trusted-partner/edit/{id}', [TrustedPartnerController::class, 'edit'])->name('trustedpartner.edit');
    Route::delete('/trusted-partner/delete/{id}', [TrustedPartnerController::class, 'destroy'])->name('trustedpartner.delete');

    // Our Teams
    route::get('/teams', [TeamsController::class, 'index'])->name('teams');
    Route::post('/teams_store_update', [TeamsController::class, 'StoreUpdate'])->name('teams.store.update');
    Route::get('/teams_get_data', [TeamsController::class, 'getData'])->name('teams_get_data');
    Route::get('/teams/edit/{id}', [TeamsController::class, 'edit'])->name('teams.edit');
    Route::delete('/teams/delete/{id}', [TeamsController::class, 'destroy'])->name('teams.delete');

    // How It Works
    route::get('/how-it-works', [HowItWorksController::class, 'index'])->name('howitworks');
    Route::post('/howitworks_store_update', [HowItWorksController::class, 'StoreUpdate'])->name('howitworks.store.update');
    Route::get('/howitworks_get_data', [HowItWorksController::class, 'getData'])->name('howitworks_get_data');
    Route::get('/howitworks/edit/{id}', [HowItWorksController::class, 'edit'])->name('howitworks.edit');
    Route::delete('/howitworks/delete/{id}', [HowItWorksController::class, 'destroy'])->name('howitworks.delete');

    // Exceeds Expectations
    route::get('/exceeds-expectations', [ExceedsExpectationsController::class, 'index'])->name('exceeds_expectations');
    Route::post('/exceeds_expectations_store_update', [ExceedsExpectationsController::class, 'StoreUpdate'])->name('exceeds_expectations.store.update');
    Route::get('/exceeds_expectations_get_data', [ExceedsExpectationsController::class, 'getData'])->name('exceeds_expectations_get_data');
    Route::get('/exceeds_expectations/edit/{id}', [ExceedsExpectationsController::class, 'edit'])->name('exceeds_expectations.edit');
    Route::delete('/exceeds_expectations/delete/{id}', [ExceedsExpectationsController::class, 'destroy'])->name('exceeds_expectations.delete');

    // Our gallery
    route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::post('/gallery_store_update', [GalleryController::class, 'StoreUpdate'])->name('gallery.store.update');
    Route::get('/gallery_get_data', [GalleryController::class, 'getData'])->name('gallery_get_data');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::delete('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery.delete');

    //Services
    route::get('/services', [ServicesController::class, 'index'])->name('services');
    route::get('/add/services', [ServicesController::class, 'create'])->name('services.addServices');
    route::post('/services/store', [ServicesController::class, "Store"])->name('services.store');
    route::get("/get-services-Data", [ServicesController::class, "getData"])->name('getServicesData');
    route::get('/edit/services/{id}', [ServicesController::class, 'Edit'])->name('services.edit');
    route::delete("/delete/services/{id}", [ServicesController::class, 'Destory'])->name('services.delete');
    route::put('/update/services/{id}', [ServicesController::class, 'Update'])->name('services.update');

    //Industries
    route::get('/industries', [IndustriesController::class, 'index'])->name('industries');
    route::get('/add/industries', [IndustriesController::class, 'create'])->name('industries.addIndustries');
    route::post('/industries/store', [IndustriesController::class, "Store"])->name('industries.store');
    route::get("/get-industries-Data", [IndustriesController::class, "getData"])->name('getIndustriesData');
    route::get('/edit/industries/{id}', [IndustriesController::class, 'Edit'])->name('industries.edit');
    route::delete("/delete/industries/{id}", [IndustriesController::class, 'Destory'])->name('industries.delete');
    route::put('/update/industries/{id}', [IndustriesController::class, 'Update'])->name('industries.update');

    //Technologies
    route::get('/technologies', [TechnologiesController::class, 'index'])->name('technologies');
    route::get('/add/technologies', [TechnologiesController::class, 'create'])->name('technologies.addTechnologies');
    route::post('/technologies/store', [TechnologiesController::class, "Store"])->name('technologies.store');
    route::get("/get-technologies-Data", [TechnologiesController::class, "getData"])->name('getTechnologiesData');
    route::get('/edit/technologies/{id}', [TechnologiesController::class, 'Edit'])->name('technologies.edit');
    route::delete("/delete/technologies/{id}", [TechnologiesController::class, 'Destory'])->name('technologies.delete');
    route::put('/update/technologies/{id}', [TechnologiesController::class, 'Update'])->name('technologies.update');

    //Feature Project
    route::get('/feature-project', [FeatureProjectController::class, 'index'])->name('featureproject');
    route::get('/add/feature-project', [FeatureProjectController::class, 'create'])->name('featureproject.addFeatureproject');
    route::post('/feature-project/store', [FeatureProjectController::class, "Store"])->name('featureproject.store');
    route::get("/get-feature-project-Data", [FeatureProjectController::class, "getData"])->name('getFeatureprojectData');
    route::get('/edit/feature-project/{id}', [FeatureProjectController::class, 'Edit'])->name('featureproject.edit');
    route::delete("/delete/feature-project/{id}", [FeatureProjectController::class, 'Destory'])->name('featureproject.delete');
    route::put('/update/feature-project/{id}', [FeatureProjectController::class, 'Update'])->name('featureproject.update');

    //printing module
    route::get('/printing', [PrintingController::class, 'index'])->name('printing');
    route::get('/add/printing', [PrintingController::class, 'create'])->name('printing.addprinting');
    route::post('/printing/store', [PrintingController::class, "Store"])->name('printing.store');
    route::get("/get-printing-Data", [PrintingController::class, "getData"])->name('getprintingData');
    route::get('/edit/printing/{id}', [PrintingController::class, 'Edit'])->name('printing.edit');
    route::delete("/delete/printing/{id}", [PrintingController::class, 'Destory'])->name('printing.delete');
    route::put('/update/printing/{id}', [PrintingController::class, 'Update'])->name('printing.update');

    //faq
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/add/faq', [FaqController::class, 'create'])->name('faq.addfaq');
    Route::post('/faq/store', [FaqController::class, "Store"])->name('faq.store');
    Route::get("/get-faq-Data", [FaqController::class, "getData"])->name('getFaqData');
    Route::get('/edit/faq/{id}', [FaqController::class, 'Edit'])->name('faq.edit');
    Route::delete("/delete/faq/{id}", [FaqController::class, 'Destory'])->name('faq.delete');
    Route::POST('/update/faq/{id}', [FaqController::class, 'Update'])->name('faq.update');

    //Blogs
    route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
    route::get('/add/blogs', [BlogsController::class, 'createBlogs'])->name('blogs.addBlogs');
    route::post('/blogs/store', [BlogsController::class, "BlogsStore"])->name('blogs.store');
    route::get("/getBlogsData", [BlogsController::class, "getBlogsData"])->name('getBlogsData');
    route::get('/edit/blogs/{id}', [BlogsController::class, 'EditBlogs'])->name('blogs.edit');
    route::delete("/delete/blogs/{id}", [BlogsController::class, 'DestoryBlogs'])->name('blogs.delete');
    route::put('/update/blogs/{id}', [BlogsController::class, 'UpdateBlogs'])->name('blogs.update');

    //Client Review
    route::get('/client_revivew', [ClientReviewController::class, 'index'])->name('client_revivew');
    route::get('/add/client_revivew', [ClientReviewController::class, 'createClientRevivew'])->name('client_revivew.addClient_revivew');
    route::post('/client_revivew/store', [ClientReviewController::class, "ClientRevivewStore"])->name('client_revivew.store');
    route::get("/getClient_revivewData", [ClientReviewController::class, "getClientRevivewData"])->name('getClient_revivewData');
    route::get('/edit/client_revivew/{id}', [ClientReviewController::class, 'EditClientRevivew'])->name('client_revivew.edit');
    route::delete("/delete/client_revivew/{id}", [ClientReviewController::class, 'DestoryClientRevivew'])->name('client_revivew.delete');
    route::put('/update/client_revivew/{id}', [ClientReviewController::class, 'UpdateClientRevivew'])->name('client_revivew.update');

    //Career Applications
    route::get('/career-applications', [CareerApplicationController::class, 'index'])->name('career-applications');
    route::get('/fetch-applications', [CareerApplicationController::class, 'fetchApplications'])->name('fetch.applications');
    route::get('/career-resume-download/{filename}', [CareerApplicationController::class, 'downloadResume'])->name('career.resume.download');
});

// service details
route::get('/{url}', [HomeController::class, 'Services'])->name('front.services');

// that is only for front-user
route::middleware(['auth', 'role:sales'])->group(function () {
    route::get('/front-dashboard', function () {
        return 'Front-user';
    });
    // route::post('/logout' , [LoginController::class , 'logout'])->name('logout');

});
