<li>
    <div id="navbar" class="collapse navbar-collapse" >
        <ul class="menu_custom">
            <li  ><a href="/politics?category_id=<?=$category_num?>"><?=$categories_name?></li></a>
            <?php foreach ($category_articles[$category_num] as $category_article) : ?>
                <li><a href="/politics/articles/?article_id=<?=$category_article->getId();?>&amp;category_id=<?=$category_num?>"><?=$category_article->getTitle();?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</li>