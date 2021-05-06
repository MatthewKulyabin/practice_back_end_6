<?php
class Controller_News extends Controller
{
	function __construct()
	{
		$this->model = new Model_News();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('news_view.php', 'template_view.php', $data);
	}

	function action_comment()
	{
		$news_id = $_POST['news_id'];
		$content = $_POST['content'];
		$user_id = $_SESSION['user_id'];
		$query = "INSERT INTO comment (news_id, content, user_id) VALUES ('$news_id', '$content', '$user_id')";
      if (!changeTable($GLOBALS['mysqli'], $query)) {
        echo "Error from post to table";
      } else {
        echo "Success!";
      }
	}

	function action_delete()
	{
		$comment_id = $_POST['comment_id'];
		$comment = getFromTable($GLOBALS['mysqli'], "SELECT * FROM comment WHERE id=$comment_id")[0];
		if ($_SESSION['user_id'] === $comment[user_id] || $_SESSION['login'] === 'admin') {
			$query = "DELETE FROM comment WHERE id=$comment_id";
      if (!changeTable($GLOBALS['mysqli'], $query)) {
        echo "Error from post to table";
      } else {
        echo "Success!";
      }
		} else {
			echo "You can not delete it";
		}
	}
}
?>

<!-- CREATE TABLE news (id INT NOT NULL AUTO_INCREMENT, title TEXT, content TEXT, PRIMARY KEY (id)) -->

<!-- CREATE TABLE comment (id INT NOT NULL AUTO_INCREMENT, news_id INT, INDEX news_ind (news_id), FOREIGN KEY(news_id) REFERENCES news(id) ON DELETE CASCADE); -->

<!-- CREATE TABLE comment (id INT NOT NULL AUTO_INCREMENT, news_id INT, INDEX news_ind (news_id), FOREIGN KEY(news_id) REFERENCES news(id) ON DELETE CASCADE, content TEXT, user_id INT, INDEX user_ind (user_id), FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE); -->

<!-- CREATE TABLE comment (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, news_id INT, INDEX news_ind (news_id), FOREIGN KEY(news_id) REFERENCES news(id) ON DELETE CASCADE, content TEXT, user_id INT, INDEX user_ind (user_id), FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE); -->