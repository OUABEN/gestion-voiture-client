<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');           
//$routes->get('home/login', 'Home::index'); 
//$routes->post('home/login', 'Home::login'); 

//$routes->get('TP2/ex1', 'TP2_EX1::index');
//$routes->post('TP2/login', 'TP2_EX1::login'); 


//$routes->get('TP2/ex2', 'TP2_EX2::index');
//$routes->post('TP2/login', 'TP2_EX2::login');

//$routes->get('TP2/ex3', 'TP2_EX3::index');
//$routes->post('TP2/subscribe', 'TP2_EX3::subscribe');


//$routes->get('TP2/ex4', 'OrderController::index');
//$routes->post('OrderController/placeOrder', 'OrderController::placeOrder');





//$routes->get('/notes', 'NotesController::index');
//$routes->post('/notes/traiter', 'NotesController::traiter');

//$routes->get('/boutique', 'Boutique::index');
//$routes->post('/Bout/ajout', 'Boutique::ajout');



$routes->get('/exe', 'Exemp::index');
$routes->post('/EX/submit', 'Exemp::submit');






$routes->get('/inscription', 'Inscription::index');
$routes->post('/inscription/submit', 'Inscription::submit');



//$routes->get('/', 'Home::index');  // Default route to the Home controller
//$routes->get('livres', 'Livre_Controller::index');  // Display the main book management view
//$routes->get('livres/obtenir', 'Livre_Controller::get_books');  // Retrieve the list of books
//$routes->post('livres/ajouter', 'Livre_Controller::add_book');  // Add a new book
//$routes->delete('livres/supprimer/(:any)', 'Livre_Controller::delete_book/$1');  // Delete a book by ID








$routes->get('/livre', 'Livre::LivreForm');
$routes->post('/livre/store', 'Livre::store');


//$routes->get('/posts/index', 'Posts::index');
//$routes->get('/posts/show', 'Posts::show/$1');
//$routes->get('/posts/create', 'Posts::create');
//$routes->get('/posts/store', 'Posts::store');
//$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');



$routes->get('/', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerSubmit');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginSubmit');

$routes->get('check', 'Auth::check');          // Show the password reset form
$routes->post('check', 'Auth::checkSubmit');   // Handle the form submission


$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard', ['filter' => 'auth']);  // Apply auth filter to dashboard
$routes->get('/voiture', 'Voiture::index');


$routes->get('/voiture', 'Voiture::index');
$routes->get('/voiture/create', 'Voiture::create');
$routes->post('/voiture/store', 'Voiture::store');
$routes->get('/voiture/show/(:any)', 'Voiture::show/$1');
$routes->get('/voiture/delete/(:any)', 'Voiture::delete/$1');

$routes->get('/voiture/table', 'Voiture::table');




$routes->get('/client', 'Client::form');               // Show the client form
$routes->get('/client/table', 'Client::table');         // Show the table of clients
$routes->post('/client/SaveClient', 'Client::SaveClient'); // Save a new client
//$routes->get('/client/edit/(:num)', 'Client::edit/$1');  // Edit a client by ID
//$routes->post('/client/update/(:num)', 'Client::updateClient/$1'); // Update a client by ID
$routes->get('client/edit/(:num)', 'Client::edit/$1'); // Edit a client by ID
$routes->post('client/updateClient/(:num)', 'Client::updateClient/$1'); // Update a client by ID
$routes->get('client/pdfFacture/(:num)', 'Client::pdfFacture/$1');
$routes->get('/client/delete/(:num)', 'Client::deleteClient/$1'); // Delete a client by ID



//$routes->get('/TP4', 'TP4::index');
//$routes->post('/TP4/ajout', 'TP4::ajout');
$routes->get('/front', 'Front::index');