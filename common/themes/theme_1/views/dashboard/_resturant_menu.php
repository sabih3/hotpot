<?php
    use yii\helpers\Html; 

    $themeBaseUrl = $this->theme->baseUrl;
    $themeRootDir = Yii::getAlias('@themeRootDir');
 
    $uploadImageUrl = str_replace('themes/theme_1', '', $themeBaseUrl);

    $lunchDays = Yii::$app->params['lunchDays'];
    // echo '<pre>';
    // print_r($data);die;
    // Yii::$app->params['fileUploadUrl'].'/uploads/' . $model['image_new_url']

    // echo strtotime(date('h:i a'));
    // echo strtotime(Yii::$app->params['dealClosingTime']);
    //echo Yii::$app->params['dealClosingTime'];die;

    include_once('jcart-1.3/jcart/jcart.php');
?>

    <title>Restaurant Menu</title>

    <!-- Bootstrap Core CSS -->
 

    <!-- Custom CSS -->
    <link href="<?= $themeBaseUrl;?>/assets/css/3-col-portfolio.css" rel="stylesheet">
    <link href="<?= $themeBaseUrl;?>/assets/css/menu-tabs.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" media="screen, projection" href="<?= $themeBaseUrl;?>/views/dashboard/jcart-1.3/style.css" />
    <link rel="stylesheet" type="text/css" media="screen, projection" href="<?= $themeBaseUrl;?>/views/dashboard/jcart-1.3/jcart/css/jcart.css" />
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



 
    <!-- Page Content -->
    <div class="container tab-content"><a name="MyTarget1"></a>
    <h1 class="page-header">Menu of Week</h1>
      <!-- /.container -->
      <!--   <div class="container">
            <div class="row">
                <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" id="day1" class="btn btn-primary" href="#tab0" data-toggle="tab">
                            <div class="hidden-xs">Monday</div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="day2" class="btn btn-default" href="#tab1" data-toggle="tab">
                            <div class="hidden-xs">Tuesday</div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="day3" class="btn btn-default" href="#tab2" data-toggle="tab">
                            <div class="hidden-xs">Wednesday</div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="day4" class="btn btn-default" href="#tab3" data-toggle="tab">
                            <div class="hidden-xs">Thursday</div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="day5" class="btn btn-default" href="#tab4" data-toggle="tab">
                            <div class="hidden-xs">Friday</div>
                        </button>
                    </div>                      
                </div>
            </div>
        </div> -->
<!-- 
                <div id="content">

                <form method="post" action="" class="jcart">
                    <fieldset>
                        <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                        <input type="hidden" name="my-item-id" value="ABC-123" />
                        <input type="hidden" name="my-item-name" value="Soccer Ball" />
                        <input type="hidden" name="my-item-price" value="25.00" />
                        <input type="hidden" name="my-item-url" value="" />

                        <ul>
                            <li><strong>Soccer Ball</strong></li>
                            <li>Price: $25.00</li>
                            <li>
                                <label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
                            </li>
                        </ul>

                        <input type="submit" name="my-add-button" value="add to cart" class="button" />
                    </fieldset>
                </form>

                <form method="post" action="" class="jcart">
                    <fieldset>
                        <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                        <input type="hidden" name="my-item-id" value="2" />
                        <input type="hidden" name="my-item-name" value="Baseball Mitt" />
                        <input type="hidden" name="my-item-price" value="19.50" />
                        <input type="hidden" name="my-item-url" value="http://yahoo.com" />

                        <ul>
                            <li><strong>Baseball Mitt</strong></li>
                            <li>Price: $19.50</li>
                            <li>
                                <label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
                            </li>
                        </ul>

                        <input type="submit" name="my-add-button" value="add to cart" class="button" />
                    </fieldset>
                </form>

                <form method="post" action="" class="jcart">
                    <fieldset>
                        <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                        <input type="hidden" name="my-item-id" value="3" />
                        <input type="hidden" name="my-item-name" value="Hockey Stick" />
                        <input type="hidden" name="my-item-price" value="33.25" />
                        <input type="hidden" name="my-item-url" value="http://bing.com" />

                        <ul>
                            <li><strong>Hockey Stick</strong></li>
                            <li>Price: $33.25</li>
                            <li>
                                <label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
                            </li>
                        </ul>

                        <input type="submit" name="my-add-button" value="add to cart" class="button tip" />
                    </fieldset>
                </form>

                <div class="clear"></div>

                <p><small>Having trouble? <a href="<?= $themeBaseUrl;?>/assets/js/jcart-1.3/jcart/server-test.php">Test your server settings.</a></small></p>

                <?php
                    //echo '<pre>';
                    //var_dump($_SESSION['jcart']);
                    //echo '</pre>';
                ?>
            </div>

                <div class="clear"></div> -->

<?php foreach ($lunchDays as $key => $value): 
$classTimeClosed = '';
?>
    <?php 
    $classActive = '';
        $tab = '';
?>
    <?php if($key == 0){
        $classActive = 'active'; 
        $tab = 'tab'; 
    }
?>
    <?php if(!empty($data[$key])): ?>
        <?php ksort($data); ?>
        <?php

        if(date('l') == $value){
            $menuDay = 'Todays\'s Menu';
            if(strtotime(date('h:i a')) > strtotime(Yii::$app->params['dealClosingTime'])){
                $classTimeClosed = 'overlay';
            }
        }
        else{
            $menuDay = $value.'\'s Menu';
        }

        ?>
        
        <div id="tab<?= $key;?>" class="tab-pane fade in <?= $classActive;?> ">
        <h3 class="page-header"><?= $menuDay; ?></h3>
        <div class="row <?= $classTimeClosed;?>">
        <?php foreach ($data[$key] as $dataKey => $value): 
        //if($value)
            // echo '<pre>';
            // print_r($dataValue);die;
            // $tab = 'tab1';
            // $classActive = 'active';
                 
   
            ?>
            
            
            <?php //foreach ($value as $key2 => $value2): ?>
            <?php //$count = 0; ?>
        <!-- Page Header -->
        
        
 <!--            <div class="col-lg-4">
                <h3><?php //echo date('l', strtotime($dataKey)); ?></h3>
                <hr />
            </div> -->
         
     
        <!-- /.row -->
        
        <?php //if(!empty($value['items'])): ?>
           
            <?php //foreach ($value['items'] as $key2 => $value2): ?>
    
        <!-- Projects Row -->
            <div class="col-md-4 portfolio-item">
                <form method="post" action="" class="jcart">
                    <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                    <input type="hidden" name="my-item-id" value="<?= $value['id']; ?>" />
                    <input type="hidden" name="my-item-name" value="<?= $value['name']; ?>" />
                    <input type="hidden" name="my-item-price" value="<?= $value['mealPrice']; ?>" />
                    <input type="hidden" name="my-item-url" value="abc" />

                   <input type="hidden" name="my-item-qty" value="1" size="3" />
                    <a href="#">
                        <img class="img-responsive" src="<?= $uploadImageUrl.'uploads/' . $value['mealImageUrl'];?>" alt="">
                    </a>
                    <h3>
                        <a href="#"><?= $value['name']; ?> <small><b>($<?= $value['mealPrice']; ?>)</b></small></a>
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.
                    </p>
               
                
                    <input type="submit" name="my-add-button" value="add to cart" class="button tip" />
                </form>
            </div>
        
    <?php //endforeach; ?>
    
   
    <?php //endif; ?>
    <?php //endforeach; ?>
  
    <?php endforeach; ?>
    <div class="clear"></div>
      </div>
     </div>
 <?php else: ?>
       <div id="tab<?= $key;?>" class="tab-pane fade in <?= $classActive;?>">
        <div class="row">
            <p>
                There is no deal for "<b><?= $value; ?></b>" right now.
            </p>
        </div>
        </div>
<?php endif;?>

<?php endforeach; ?>
        <!-- /.row -->
       
        <!-- Pagination 
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>-->
        <!-- /.row -->

        <hr>


<div class="clear"></div>

    </div>

    <div id='object'> 
        <div class='jcart-main hide-jcart'>  
            <div id="jcart"><?php $jcart->display_cart();?></div>
        </div> 
        <div>
            <input type='button' value='Proceed to order' class='btn btn-proceed' />
            <!--<span>Add items from the menu to enable the order button.<br />
            Open 24 hours</span>-->
        </div> 
        <div class="container push-class customer-info">
            <div class="row">
                <div class="col-lg-3 col-sm-3 jcart-main">
                    <h4>Your Information</h4>
                    <div class="input-group field-bottom">
                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                        <input type="text" class="form-control" placeholder="Enter your full name">
                    </div>
                    <div class="input-group field-bottom">
                        <span class="input-group-addon glyphicon glyphicon-earphone"></span>
                        <input type="text" class="form-control" placeholder="Enter your cell number">
                    </div>
                    <div class="input-group field-bottom">
                        <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                        <input type="text" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="input-group field-bottom">
                        <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <textarea name="styled-textarea" id="styled" class="form-control" placeholder="Complete Address"></textarea>
                    </div>
                    <div><span><a href="#" class="back-to-jcart">Back</a></span><input type='button' value='Place order' class='btn btn-place-order' /></div>
                </div>
            </div>
        </div>

        <div class="container order-symmary">
            <div class="row">
            <div class="col-lg-3 col-sm-3 jcart-main">
                <div>
                    <p>Thanks wsx,</p>

                    <p>This is your first order, we will call you shortly from 111-486-479 to verify your mobile number.</p>

                    <p>Approximate delivery time:</p>

                    <p>45 mins</p>

                    <p>Order total:</p>

                    <p>Rs. 1749</p>

                    <p>This order cannot be cancelled. In case of any delay in confirming your order please call HOTPOT on 111-HOTPOT<p>
                </div>
                <div><input type='button' value='Track your order' class='btn btn-proceed' /></div>
            </div>
            </div>
        </div>
    </div>

    <!-- /.container -->

    <!-- jQuery -->
<style type="text/css">
    input[type=text] {
  float: left;
  width: 40px;
  font: bold 20px Helvetica, sans-serif;
  padding: 3px 0 0 0;
  text-align: center;
}
</style>
</body>

</html>

<script type="text/javascript" src="<?=$themeBaseUrl; ?>/views/dashboard/jcart-1.3/jcart/js/jcart.js"></script>

<script type="text/javascript">
$(document).ready(function(){

        $(".btn-pref .btn").click(function () {
            $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
            // $(".tab").addClass("active"); // instead of this do the below 
            $(this).removeClass("btn-default").addClass("btn-primary");   
            });

});
</script>

<style>

        .overlay {
            position: relative;
            right: 0px;
            top: 0;
            width: 100%;
            height: !00%;
            background: rgba(0, 0, 0, 0.02);
            pointer-events: none;
            padding: 0 0 0 18px;
        }
        .pointer-events-none {
            pointer-events: none;
        }
    </style>
    <script>

    $(document).ready(function(){
        $('#object').find('.container').hide();

        $('#object .btn-proceed').click(function(e){
            e.preventDefault();
            
            $('#object').find('.hide-jcart').hide();
            $(this).hide();
            $('#object').find(".customer-info").show();
        });

        $('#object .btn-place-order').click(function(e){
            e.preventDefault();
      
            $('#object').find(".customer-info").hide();
            $(this).hide();
            $('#object').find(".order-symmary").show();
        });

        $('#object .back-to-jcart').click(function(e){
            e.preventDefault();
            
            $('#object').find('.hide-jcart').show();
            $('#object').find(".container").hide();
            $('#object').find(".btn-proceed").show();
        });
    });
        // window.onload = function () {
        //     document.getElementById("enable-disable-pointer-events").onclick = function () {
        //         document.getElementById("overlay").className = "overlay " + ((this.checked)? "pointer-events-none" : "");
        //     };
        // };
    </script>

     <script>
        //http://stackoverflow.com/questions/5273453/using-jquery-to-keep-scrolling-object-within-visible-window
        $(window).scroll(function(){
            var objectTop = $('#object').position().top;
            var objectHeight = $('#object').outerHeight();    
            var windowScrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();
            
            if  (windowScrollTop  > objectTop)
                $('#object').css('top', windowScrollTop );
            else if ((windowScrollTop+windowHeight) < (objectTop + objectHeight))
                $('#object').css('top', (windowScrollTop+windowHeight) - objectHeight);        
            
            //$('#object').html('Top: ' + $('#object').position().top + 'px');
            
        });
    </script>



