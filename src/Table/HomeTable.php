<?php
namespace App\Table;
use App\Model\Home;
use App\Table\Exception\NotFoundException;
use \PDO;

class HomeTable extends Table{

    protected $table = "image_home";
    protected $class = Home::class;

    
/**
 * @param App\Model\Post[] $posts
 */
    public function hydratePosts(array $posts):void
    {
        $postByID = [];
        foreach($posts as $post){
            $post->setImage([]);
            $postsByID[$post->getID()] = $post;
        }

        $images = $this->pdo
            ->query('SELECT *FROM image_home ');
                
        foreach($images as $image){
            $postsByID[$image->getId()];
        }

    }

    public function list():array
    {
        $images = $this->all();
        $results = [];
        foreach ($images as $images)
        {
            $results[$image->getID()] = $image->getName();
        }
        return $results;
    }

    
    public function findPaginated(){
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY created_at DESC",
            "SELECT COUNT(id) FROM {$this->table}",
            $this->pdo
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }

    public function findPaginatedForCategory(int $categoryID)
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT p.* 
                FROM {$this->table} p
                JOIN post_category pc ON pc.post_id = p.id
                WHERE pc.category_id = {$categoryID}
                ORDER BY created_at DESC", 
            "SELECT COUNT(category_id) 
                FROM post_category 
                WHERE category_id ={$categoryID}"  
        );
       
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];

    }

}
