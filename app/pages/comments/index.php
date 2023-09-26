<?php
// index.php
include_once("controllers/CommentController.php");
include_once("models/CommentModel.php");

// Create instances of the controller and model
$commentController = new CommentController();
$commentModel = new CommentModel();

// Route requests based on URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $comments = $commentController->index();
        include("views/comment_view.php");
        break;
    case 'displayForm':
        $commentController->displayForm();
        break;
    case 'process':
        $commentController->processForm();
        break;
    default:
        // Handle other actions or errors
        break;
}
