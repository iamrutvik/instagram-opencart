<style type="text/css">
    .img1{
       <?php echo $stylesheet; ?>
    }
</style>

<h3><?php echo $title; ?></h3>

<?php
if($is_error){
?>
<div class="row">
    <h4><?php echo $error; ?><h4>
</div>
<?php
}else{
?>
<div class="row">

        <?php
     foreach ($images as $image){
        echo '<div class="img1">';
        echo '<img src="'.$image.'"/>';
        echo '</div>';
    }
    ?>

<?php
}
?>
</div>
