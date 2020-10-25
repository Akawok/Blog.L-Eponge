<?php

class admin extends Controller {
    public function administration(){
        $d['template'] = array(
            'h1' => '<h1>Page Administrateur</h1>',
            'form' => '<form method="POST">',
            'category' => '<label for="start">Choix de la catégorie: </label><select name="category">
            <option name="category" value="Gif">Gif</option>
            <option name="category" value="Wtf">Wtf</option>
            </select><br><br>',
            'title' => '<label for="title">Titre de l\'article: </label><input type="text" name="title" id="title"><br><br>',
            'img' => '<label>Image: </label><input type="text" name="img" id="img"><br><br>',
            'date' => '<label for="start">Date de publication:</label>
            <input type="date" id="date" name="date"><br><br>',
            'textarea' => '<textarea id="mytextarea" name="textarea"></textarea><br>',
            'submit' => '<input type="submit" name="create" value="create">',
            'cform' => '</form>'
        );
        $this->set($d);
        $this->render('admin');
    }
}