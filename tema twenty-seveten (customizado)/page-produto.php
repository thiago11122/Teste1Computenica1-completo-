<?php 
      $style='produto';
      include('header.php');
      
?>
<html>
<head>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>">
</head>

<body>

<?php query_posts('post_type=produto&post_per_page=-1'); ?>
       <?php if(have_posts()): while(have_posts()): the_post(); ?>
              <h1> <?php the_title(); ?> </h1>
                  <strong>ID:</strong>&nbsp; <?php the_field('Id');?> <br/>
                   <strong>Nome:</strong>&nbsp;<?php the_field('Nome');?><br/>
                   <strong>Descrição:</strong>&nbsp;<?php the_field('Descrição');?> <br/>
                   <strong>Preço:</strong>&nbsp;<?php the_field('Preço');?> <br/>
                   
       <?php endwhile; ?>
       <?php else: ?>
            Não existem produtos cadastrados.
       <?php endif; ?>
<?php wp_reset_query(); ?>
<?php include ('footer.php'); ?>