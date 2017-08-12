<?php 
      $style='pedido';
      include('header.php');
      
?>
<html>
<head>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>">
</head>

<body>
     <?php query_posts('post_type=pedido&post_per_page=-1'); ?>
       <?php if(have_posts()): while(have_posts()): the_post(); ?>
              <?php $post_id = get_the_ID(); ?>
              <h1> <?php the_title(); ?> </h1>
              <strong>Nome do Cliente:</strong>
                    <?php $Cliente = get_field('Cliente'); ?>
                    <?php $Nome= get_field('Nome', $Cliente->ID)?>
                    <?php if ($Nome):?>
                            <?php echo $Nome;?><br/><br/>
                    <?php endif;?>
                    <strong>Itens da Compra:</strong> <br/>
                    <?php $itens_type_posts = (array) get_field('Itens de Compra'); ?>
                          <?php foreach ($itens_type_posts as $item_type_post): ?>
                               <?php $itens_type_produto = get_field('Produto', $item_type_post->ID) ?>
                               <?php $itens_type_nome= get_field('Nome',$itens_type_produto->ID)?>
                               <?php $itens_type_quant= get_field('Quantidade', $item_type_post->ID) ?>
                               
                               <?php if ($itens_type_nome) : ?>
                                       <?php echo $itens_type_nome;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       Quantidade:&nbsp; <?php echo $itens_type_quant;?> <br/>
                                <?php endif ?>
                           <?php endforeach ?>
                  
       <?php endwhile; ?>
       <?php else: ?>
            Não existem pedidos cadastrados.
       <?php endif; ?>
<?php wp_reset_query(); ?>
<?php include ('footer.php'); ?>