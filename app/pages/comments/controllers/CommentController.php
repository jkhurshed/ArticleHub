
<?php
include_once("../../../includes/db.php");

class CommentController {
    public function index() {
        try {
            $sql = "SELECT * FROM comment";
            $result = $db->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (mysqli_sql_exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function displayForm() {
        include("../views/comment_form_view.php");
    }

    public function processForm() {
        if (isset($_POST['text'], $_POST['user_id'], $_POST['post_id'])) {
            try {
                $commentModel = new CommentModel();
                $commentModel->addComment($_POST['text'], $_POST['user_id'], $_POST['post_id']);
                
                header("Location: ../comment.php");
                exit;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
