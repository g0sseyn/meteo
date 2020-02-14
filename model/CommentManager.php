<?php
require_once('Manager.php');
class CommentManager extends Manager
{
	public function getComments($postId) {
		$comments = $this->db->prepare ('SELECT id,  author ,comment ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, is_signaled FROM comments WHERE news_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));	
		return $comments;
	}
}