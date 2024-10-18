
    <?php include('partials-front/menu.php'); ?>

  
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    
    <section class="food-menu">
        <div class="container">
            <h2 class="text-leftcenter">Food Menu</h2>

            <?php 
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

               
                $res=mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                
                if($count>0)
                {
                 
                    while($row=mysqli_fetch_assoc($res))
                    {
                        
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class center="food-menu-box">
                            <div class center="food-menu-img">
                                <?php 
                                   
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Assorted Salted Cookies" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
								
								<br>
								
								
								</br>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not Available
                    echo "<div class='error'>Food not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    
    <?php include('partials-front/footer.php'); ?>