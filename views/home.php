<?php
session_start();
include_once("../controllers/db.php");
$prods=getProducts();
include_once("header.php");
?>

    <section>
        <article> 

            <?php foreach($prods as $prod) :?>
                <div class="article">
                    <img src=<?="../".$prod->image ?> alt="" class="prodimg">
                    <div class="titre"><?=$prod->titre ?></div>
                    <div class="prix"><?=$prod->prix ?>DH</div>
                    <a href=<?= "../controllers/addToCart.php?id=".$prod->id ?> class="add"></a>
                    <a href=<?="details.php?id=".$prod->id ?>  class="detail">Detail</a>
                </div>
            <?php endforeach ?> 
            
        </article>
        
    </section>

    <aside> 
    <div class="title">Mn Panier</div>
            
            <?php if(isset ($_SESSION["cart"])):?>  
                <form action="search.php" method="POST" class="searchefrm">
                <input type="text" >
                <input type="submit" value="Search" name="search">
            </form>
                <div class="title">Total: <?=$_SESSION["total"] ?></div>
            <?php foreach($_SESSION["cart"] as $p):?>
                <div class="element">
                    <img src=<?="../".$p["image"]?> alt="" class="prodimgmin">
                    <div><?=$p["titre"]?></div>
                    <div><?=$p["qtt"]?></div>
                    <a href="delete.php?id=<?= $p['id']  ?>"  class="delete"></a>
                </div>
            <?php endforeach ?>
            <?php endif ?>
        </aside>
<?php
include_once("footer.php");
?>