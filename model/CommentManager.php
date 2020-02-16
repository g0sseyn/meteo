<?php
require_once('Manager.php');
class CommentManager extends Manager
{
	public function getComments($postId) {
		$comments = $this->db->prepare ('SELECT id,  author ,comment ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, is_signaled FROM comments WHERE news_id = ? ORDER BY comment_date ');
		$comments->execute(array($postId));	
		return $comments;
	}
	public function updateComment($id,$comment){
		$updateComment = $this->db->prepare('UPDATE comments SET comment = ?,is_signaled = "0" WHERE id = ?');
		$updateComment->execute(array($comment, $id));
	}
	public function deleteComment($Id){
		$deletedComment = $this->db->prepare('DELETE FROM comments WHERE id = ?');
		$deletedComment->execute(array($Id));
	}
	public function getAllSignaledComments(){
		$signaledComments = $this->db->query ('SELECT *  FROM comments  WHERE is_signaled = "1" ORDER BY comment_date DESC');	
		return $signaledComments;
	}
	public function postComment($postId, $author, $comment)	{
	    $comments = $this->db->prepare('INSERT INTO comments(news_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($postId, $author, $comment));
	    return $affectedLines;
	}
}