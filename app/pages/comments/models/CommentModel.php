// models/CommentModel.php
<?php
include_once("../../../includes/db.php");

class CommentModel {
    public function getAllComments() {
        try {
            $sql = "SELECT * FROM comment";
            $result = $db->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (mysqli_sql_exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function addComment($text, $user_id, $post_id) {
        try {
            $sql = 'INSERT INTO comment(text, user_id, post_id) VALUES (?, ?, ?)';
            $stmt = $db->prepare($sql);
            $stmt->bind_param('sii', $text, $user_id, $post_id);
            $stmt->execute();
            $stmt->close();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
