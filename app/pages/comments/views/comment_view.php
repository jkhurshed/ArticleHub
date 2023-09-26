<!-- views/comment_view.php -->
<h3>Comments</h3>

<a href="add_comment.php">Add comment</a>

<table border="1" width="100%">
    <tr>
        <th width="5%">ID</th>
        <th width="40%">Text</th>
        <th width="5%">User</th>
        <th width="5%">Post</th>
    </tr>
    <?php foreach ($comments as $comment): ?>
        <tr>
            <td><?php echo $comment['id']; ?></td>
            <td><?php echo $comment['text']; ?></td>
            <td><?php echo $comment['user_id']; ?></td>
            <td><?php echo $comment['post_id']; ?></td>
            <td>
                <a href="update_comment_form.php?id=<?php echo $comment['id']; ?>">Edit</a> |
                <a href="delete_comment.php?id=<?php echo $comment['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
