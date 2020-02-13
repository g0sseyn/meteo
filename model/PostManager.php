<?php
require_once('Manager.php');

class PostManager extends Manager 
{
	public function getPosts(){
		$posts = $this->db->query('SELECT id, title_news, content_news, DATE_FORMAT(creation_date_news, \'%d/%m/%Y à %Hh%i\') AS creation_date_news_fr ,img_url FROM news ORDER BY creation_date_news DESC');
		return $posts;
	}
	public function deletePost($id){
		$this->db->beginTransaction();
		$deletedComments = $this->db->prepare('DELETE FROM comments WHERE news_id = ?');
		$test1=$deletedComments->execute(array($id));
		$deletedPost = $this->db->prepare('DELETE FROM news WHERE id = ?');
		$test2=$deletedPost->execute(array($id));
		if (($test1)&&($test2)) {
			$this->db->commit();
		}
		else $this->db->rollBack();
	}
}