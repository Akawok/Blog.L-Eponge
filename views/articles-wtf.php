<?php 
    foreach ($create['articles'] as $key => $value){
        echo "<div id='all2'><article>";
        foreach($value as $key => $data){
            if($key == 'id'){
                echo  "<a href='http://www.blog-leponge.com/wtf/articles/".$data."'>Lire l'article</a>";
            }
            elseif($key == 'title'){
                echo "<h3>".$data."</h3>";
            }
            elseif($key == 'content'){
                echo '<p>'.$data.'</p>';
            }
            elseif($key == 'date'){
                echo '<span>Date de publication : '.$data.'</span><br>';
            }
            elseif($key == 'image'){
                echo $data;
            }
        }
        echo "</article>";
    }
?>