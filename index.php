<?php
    define('WEBROOT' , str_replace('index.php' , '' , $_SERVER['SCRIPT_NAME']));
    define('ROOT' , str_replace('index.php' , '' , $_SERVER['SCRIPT_FILENAME'])); 
    require(ROOT.'core/controller.php');
    $hide = '<style type="text/css">#all{display:none;}</style>';
    $hide_nav = '<style type="text/css">nav{display:none;}</style>';
?>
<!DOCTYPE html>
<html lang="fr" >
<head>
    <link rel="stylesheet" href="../../style.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog L'Eponge</title>
</head>
<body>
    <header>
        <img src="../../bob.png" alt="logo">
    </header>
    <nav>
        <ul>
			<li><a href="http://www.blog-leponge.com/" title="Accueil">Accueil</a></li>
			<li><a href="/gif/articles" title="Gif">Gif</a></li>
			<li><a href="/wtf/articles" title="Wtf">Wtf</a></li>
		</ul>
    </nav>
    <div id="all">
<?php
    require_once('./models/db_articles.class.php');
    $articles = Articles_db::getAll();
    foreach($articles as $key => $value){
        $temp = "";
        echo "<article>";
        foreach($value as $key => $data){
            if($key == 'id'){
                $temp = $data;
            }
            elseif($key == 'category'){
                echo  "<a href='http://www.blog-leponge.com/".strtolower($data)."/articles/".$temp."'>Lire l'article</a>";
            }
            elseif($key == 'date'){
                echo '<span>Date de publication : '.$data.'</span><br>';
            }
            elseif($key == 'image'){
                echo $data;
            }
            else{
                echo "<h3>".$data."</h3>";
            }
        }
        echo "</article>";
    }
?>
</div>
<?php
    
    $param = explode('/',$_GET['p']);
    if(count($param) == 2 && $param[0] != 'admin'){
        echo $hide;
        $controller = $param[0] ;
        $action = $param[1] ;
        $called = 'controllers/'.$controller.'.php' ;
        require($called);
        if ( method_exists( $controller , $action )) {
            $myctrl = new $controller();
            $myctrl->$action();
        }
        else {
            echo "methode non existante, erreur 404";
        }
    }

    if(count($param) > 2){
        echo $hide;
        $controller = $param[0] ; 
        $action = $param[1] ;
        $attribute = $param[2];
        $called = 'controllers/'.$controller.'.php' ;
        require($called);
        if ( method_exists( $controller , $action )) {
            $myctrl = new $controller();
            $myctrl->$action($attribute);
        }
        else {
            echo "methode non existante, erreur 404";
        }
    }

    if($param[0] == 'admin'){
        echo $hide_nav;
        echo $hide;
        $controller = $param[0] ;
        $action = $param[1] ;
        $called = 'controllers/'.$controller.'.php' ;
        require($called);
        if ( method_exists( $controller , $action )) {
            $myctrl = new $controller();
            $myctrl->$action();
        }
        else {
            echo "methode non existante, erreur 404";
        }
    }

?> 
</body>
</html>