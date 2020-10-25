<?php

class Articles_db{
    
    // return all articles
    static function getAll(){ 
        require('log_sql.php');
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query =  $conn->prepare("SELECT title, image, date, id, category FROM articles");
            $query-> execute(array());
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOexception $e){
            echo "Erreur : ".$e->getMessage();
            die();
        }
    }

    // return one selected article
    static function getOne($i){ 
        require('log_sql.php');
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare("SELECT title, content, date FROM articles WHERE id =  '".$i."'");
            $query-> execute(array());
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch (PDOexception $e){
            echo "Erreur : ".$e->getMessage();
            die();
        }
    }

    //return all articles from one category
    static function getCategory($c){ 
        require('log_sql.php');
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query =  $conn->prepare("SELECT title,image, date, id FROM articles WHERE category = '".$c."'");
            $query-> execute(array());
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOexception $e){
            echo "Erreur : ".$e->getMessage();
            die();
        }
    }

    //Add an Article
    static function setArticles(){
        require('log_sql.php');
        try{
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare('INSERT INTO articles(category, title, content, date, image) VALUES (:category, :title, :textarea, :date, :img)');
            $query->execute(array(
                ':category' => $_POST['category'],
                ':title' => $_POST['title'],
                ':textarea' => $_POST['textarea'],
                ':date' => $_POST['date'],
                ':img' => "<img src= ".$_POST['img'].'width="75" height="75" frameBorder="0" allowFullScreen>'
            ));
            return "Nouvel article enregistré";
        }
        catch (PDOexception $e){
            echo "Erreur : ".$e->getMessage();
            die();
        }
    }
} // Fin de classe
