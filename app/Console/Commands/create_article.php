<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use Illuminate\Support\Str;
class create_article extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_article';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Création d'articles";


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articles = json_decode(file_get_contents(resource_path('data/articles.json')));
        $this->articles = $articles->articles;
        foreach($articles->articles as $article){
 
            $newArticle = Article::create([
            'title'=>$article->title,
            'description'=>Str::limit($article->description,100),
            'content'=>$article->content,
            'slug'=>Str::slug($article->title),
            ]);
        }
    }
}