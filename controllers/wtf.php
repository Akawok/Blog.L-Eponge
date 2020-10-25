<?php

class wtf extends Controller {
    public function articles($i=null){
        require_once('./models/db_articles.class.php');
        if($i == null){
            $articles_wtf = Articles_db::getCategory('Wtf');
            $d['create'] = array('articles' => $articles_wtf);
            $this->set($d);
            $this->render('articles-wtf');
        }
        else{
            $articles_wtf = Articles_db::getOne($i);
            $d['create'] = array('articles' => $articles_wtf);
            $this->set($d);
            $this->render('articles-wtf');
        }
    }
}