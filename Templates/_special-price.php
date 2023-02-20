     <?php
        $brand = array_map(function($pro){return $pro['item_brand'];},$product_shuffle);
        $unique = array_unique($brand);
        sort($unique);
        shuffle($product_shuffle);

            //request method post
 
    //request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['special_price_submit'])){
                   //call method addToCart
           $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
       }
   }
   
   $in_cart = $Cart->getCartId($product->getData('cart'));

   ?>
       
       <!-- !special price -->
        <section id="special-price">
            <div class="container">
                <h4 class="font-robo font-size-2 color-second-bg color-yellow pt-1 ps-2 d-flex justify-content-start align-items-center " style="width: 200px;height:40px;border-radius:10px;">Nos produits</h4>
                <div id="filters" class="button-group text-end font-mont font-size-16">
                    <button class="btn is-checked bold" data-filter="*">Toutes Les Marques</button>
                    <?php 
                    array_map(function($brand){
                        printf('<button class="btn bold" data-filter=".%s">%s</button>',$brand,$brand);
                    },$unique);?>
                </div>

                <div class="grid">
                    <?php array_map(function($item) use($in_cart){ ?>
                    <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"; ?>">
                        <div id="prod" class="item py-2" style="width:200px">
                            <div class="product font-mont">
                                <a href="<?php printf('%s?item_id=%s','product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png";?>"
                                        alt="product13"
                                        class="img-fluid"></a>
                                <div class="text-center">
                                    <h6><?php echo $item['item_name'] ?? "Unknow" ?></h6>
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <div class="price py-2">
                                        <span>$<?php echo $item['item_price'] ?? "Unknow" ?></span>
                                    </div>
                                    <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php 
                                    if(in_array($item['item_id'], $in_cart ?? [])){
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">Dans le panier</button>';
                                    }else{
                                        echo '<button type="submit" name="top_sale_submit" class="btn color-primary-bg color-yellow  font-size-12">Ajouter au Panier</button>';
                                    }
                                ?>
                               </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php },$product_shuffle) ?>
                </div>
            </div>
        </section>
        <!-- !special price -->