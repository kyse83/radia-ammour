<?php
namespace App\Table;
use App\Model\Category;
use App\Table\Exception\NotFoundException;
use \PDO;

class CategoryTable extends Table{

    protected $table = "category";
    protected $class = Category::class;

    
/**
 * @param App\Model\Post[] $posts
 */
    public function hydratePosts(array $posts):void
    {
        $postByID = [];
        foreach($posts as $post){
            $post->setCategories([]);
            $postsByID[$post->getID()] = $post;
        }

        $categories = $this->pdo
            ->query('SELECT c.*,pc.post_id
                    FROM post_category pc
                    JOIN category c ON c.id = pc.category_id
                    WHERE pc.post_id IN ('.implode(',',array_keys($postsByID)). ')'
            )->fetchAll(PDO::FETCH_CLASS,$this->class);
        foreach($categories as $category){
            $postsByID[$category->getPostID()]->addCategory($category);
        }

    }

    public function list():array
    {
        $categories = $this->all();
        $results = [];
        foreach ($categories as $category)
        {
            $results[$category->getID()] = $category->getName();
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
