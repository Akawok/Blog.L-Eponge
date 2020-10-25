<?php

class gif extends Controller {
    public function articles($i=null){
        require_once('./models/db_articles.class.php');
        if($i == null){
            $articles_gif = Articles_db::getCategory('gif');
            $d['create'] = array( 
                'articles' => $articles_gif);
            $this->set($d);
            $this->render('articles-gif');
        }
        else{
            $articles_gif = Articles_db::getOne($i);
            $d['create'] = array('articles' => $articles_gif);
            $this->set($d);
            $this->render('articles-gif');
        }
    }
}