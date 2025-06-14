<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\AboutNatureTherapyController;
use App\Http\Controllers\Api\HeroSectionController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\ReliableServiceController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\AboutSectionController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\VisionMissionController;
use App\Http\Controllers\Api\LeadershipTeamController;
use App\Http\Controllers\Api\ValueSectionController;
use App\Http\Controllers\Api\WhyChooseUsController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\Api\NatureTherapyController; 
use App\Http\Controllers\Api\PracticedSectionController;
use App\Http\Controllers\Api\PatientStoryController;
use App\Http\Controllers\Api\AwardController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\TherapyFeatureController;
use App\Http\Controllers\Api\TherapySolutionController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('/api')->controller(HomeController::class)->group(function () {
  
Route::get('/hero-sections', [HeroSectionController::class, 'index']);
Route::get('/about-nature-therapy', [AboutNatureTherapyController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('departments', [DepartmentController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/clients', [ClientController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);
Route::get('/about-sections', [AboutSectionController::class, 'index']);
Route::get('/values', [ValueSectionController::class, 'index']);
Route::get('/vision-missions', [VisionMissionController::class, 'index']);
Route::get('/leadership-team', [LeadershipTeamController::class, 'index']);
Route::get('/reliable-services', [ReliableServiceController::class, 'index']);
Route::get('/why-choose-us', [WhyChooseUsController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog-post', [BlogPostController::class, 'index']);
Route::get('/blog/recent', [BlogController::class, 'recent']);
Route::get('/categories', [BlogController::class, 'byCategory']);
Route::get('/blog/category/{category}', [BlogController::class, 'byCategory']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);
Route::get('/naturetherapy', [NatureTherapyController::class, 'index']);
Route::get('/practiced-section', [PracticedSectionController::class, 'index']);
Route::get('/patient-stories', [PatientStoryController::class, 'index']);
Route::get('/awards', [AwardController::class, 'index']);
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::get('/therapy-features', [TherapyFeatureController::class, 'index']);
Route::get('/therapy-solutions', [TherapySolutionController::class, 'index']);
// homepage - final

}); 