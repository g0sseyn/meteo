<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'Manager.php';

class PostManager extends Manager 
{
	public function getPosts(){
		$posts = $this->db->query('SELECT id, title_news, content_news, DATE_FORMAT(creation_date_news, \'%d/%m/%Y à %Hh%i\') AS creation_date_news_fr ,img_url FROM news ORDER BY creation_date_news DESC');
		return $posts;
	}
	public function getPost($postId){
		$req = $this->db->prepare('SELECT id, title_news, content_news, DATE_FORMAT(creation_date_news, \'%d/%m/%Y à %Hh%i\') AS creation_date_news_fr ,img_url FROM news WHERE id = ?');
    	$req->execute(array($postId));
    	$post = $req->fetch();
    	return $post;
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
	public function addPost($title, $content, $imgURL){		
	    $news = $this->db->prepare('INSERT INTO news(title_news, content_news, creation_date_news, img_url) VALUES(:title, :content, NOW(),:imgurl )');
	    $affectedLines = $news->execute(array('title'=>$title,'content'=> $content,'imgurl'=> $imgURL));	   
	    return $affectedLines;
	}
	public function updatePost($id,$title,$content,$imgURL){
		$updatePost = $this->db->prepare('UPDATE news SET title_news = ?,content_news = ?,img_url = ? WHERE id = ?');
		$updatePost->execute(array($title, $content, $imgURL,$id));
	}
}