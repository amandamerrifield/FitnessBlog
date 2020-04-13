<p>
    <?php $post = new Posts();
//    $readAll= new readAll();

    echo $post->test . " \n";
            ?>

</p>
<p>
    <?php
            echo $post->quantityElements;
   
            ?>
</p>
<p>
    <?php
echo count($post->all);

     ?>     
</p>