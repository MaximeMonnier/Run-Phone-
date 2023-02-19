<?php
    $item_id=$_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>
        
        <!-- product -->
        <section id="product" class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product" class="img-fluid">
                            <div class="row pt-4 font-size-16 font-mont">
                                <div style="width: 45%;margin:auto;">
                                <?php 
                                    if(in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                        echo '<button type="submit" disabled class="btn btn-success font-size-16">Dans le panier</button>';
                                    }else{
                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Ajouter au Panier</button>';
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 py-5">
                            <h5 class="font-mont font-size-20"><?php echo $item['item_name'] ?? "Unknow"; ?></h5>
                            <small><?php echo $item['item_brand'] ?? "Brand"; ?></small>
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="" class="px-2 font-robo font-size-14">20.534 évaluations | 1000+ réponse au questions</a>
                            </div>
                            <hr>

                            <!-- product price -->
                            <table class="my-3">
                                <tr class="font-mont font-size-14">
                                    <td>M.R.P:</td>
                                    <td><strike>$162.00</strike></td>
                                </tr>
                                <tr class="font-mont font-size-14">
                                    <td>Deal price</td>
                                    <td class="font-size-20 text-danger">$<span><?php echo $item['item_price'] ?? "Unknow"; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Taxes inclus</small></td>
                                </tr>
                                <tr class="font-mont font-size-14">
                                    <td>Vous économiser</td>
                                    <td>$<span class="font-size-16 text-danger">152.00</span></td>
                                </tr>
                            </table>
                            <!-- !product price -->

                            <!-- policy -->
                            <div id="policy">
                                <div class="d-flex">
                                    <div class="return text-center me-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-rale font-size-12">10 Jours <br>Remplacements</a>
                                    </div>
                                    <div class="return text-center me-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-truck border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-rale font-size-12">Durée<br>De Livraison</a>
                                    </div>
                                    <div class="return text-center me-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-rale font-size-12">1 Ans<br>de Garanties</a>
                                    </div>
                                </div>
                            </div>
                            <!-- !policy -->
                            <hr>
                             <!-- order details -->
                             <div id="order-details" class="font-mont d-flex flex-column text-dark">
                                <small>Livraison prévue entre : Le 29 Mars - 1   Avril</small>
                                <small>Vendu par <a href="#">Daily Electronics </a>( 4.5 / 5 | 18.198 Notes)</small>
                                <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Livraison a (....) - 424201</small>
                             </div>
                             <!-- !order details -->
                             <hr>

                             <div class="row">
                                <div class="col-6">
                                       <!-- color -->
                                           <div class="color my-3">
                                             <div class="d-flex justify-content-between">
                                               <h6 class="font-mont mt-3">Color:</h6>
                                               <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                               <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                               <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                             </div>
                                           </div>
                                       <!-- !color -->
                                </div>
                                <div class="col-6">
                                  <!-- product qty section -->  
                                    <div class="qty d-flex mt-4">
                                        <h6 class="font-mont">Qty</h6>
                                        <div class="px-4 d-flex font-robo">
                                            <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                            <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                            <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                        </div>
                                    </div>
                                   <!-- !product qty section -->  
                                </div>
                            </div>
                             
                            <!-- size -->
                             <div class="size my-5">
                                <h6 class="font-robo mb-3">Size</h6>
                                <div class="d-flex justify-content-between w-75">
                                    <div class="font-robo border p-2">
                                        <button class="btn p-0 font-size-14">4 GB RAM</button>
                                    </div>
                                    <div class="font-robo border p-2">
                                        <button class="btn p-0 font-size-14">6 GB RAM</button>
                                    </div>
                                    <div class="font-robo border p-2">
                                        <button class="btn p-0 font-size-14">8 GB RAM</button>
                                    </div>
                                </div>
                             </div>
                            <!-- !size -->

                        </div>

                        <div class="col-12">
                            <h6 class="font-mont">Product Description</h6>
                            <hr>
                            <p class="font-robo font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates iure rerum maiores repellendus! Tempora sint incidunt molestiae sequi quas dolorem tempore iusto omnis sunt cumque impedit, at quis? Hic accusamus, voluptatum esse dignissimos, corrupti est, quidem eos fugit ipsum perferendis molestiae eveniet sed commodi temporibus odio nisi soluta. Ea non ad, rerum commodi aperiam error! Voluptate, eveniet quisquam. Itaque eaque est, vel corrupti neque accusantium debitis explicabo magni nisi quos?</p>
                            <p class="font-robo font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates iure rerum maiores repellendus! Tempora sint incidunt molestiae sequi quas dolorem tempore iusto omnis sunt cumque impedit, at quis? Hic accusamus, voluptatum esse dignissimos, corrupti est, quidem eos fugit ipsum perferendis molestiae eveniet sed commodi temporibus odio nisi soluta. Ea non ad, rerum commodi aperiam error! Voluptate, eveniet quisquam. Itaque eaque est, vel corrupti neque accusantium debitis explicabo magni nisi quos?</p>
                        </div>

                    </div>
                </div>
            </section>
        <!-- !product -->
<?php 
endif;
endforeach; 
?>