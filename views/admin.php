<head>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>
<?=$template['h1']?>
<?=$template['form']?>
<?=$template['category']?>
<?=$template['title']?>
<?=$template['img']?>
<?=$template['date']?>
<?=$template['textarea']?>
<?=$template['submit']?>
<?=$template['cform']?>
<?php
if(isset($_POST['create'])){
    require_once('./models/db_articles.class.php');
    echo Articles_db::setArticles();
    header('Refresh: 2; URL=http://www.blog-leponge.com/admin/administration');
}