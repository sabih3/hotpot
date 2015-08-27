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
        <br />
            <div id="sidebar">
                <div id="jcart"><?php $jcart->display_cart();?></div>
            </div>

                <div id="content">

                <form method="post" id="jcart">
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

              <!--   <form method="post" action="" class="jcart">
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
 -->
                <div class="clear"></div>

                <p><small>Having trouble? <a href="<?= $themeBaseUrl;?>/assets/js/jcart-1.3/jcart/server-test.php">Test your server settings.</a></small></p>

                <?php
                    //echo '<pre>';
                    //var_dump($_SESSION['jcart']);
                    //echo '</pre>';
                ?>
            </div>

                <div class="clear"></div>

       <?php



?>


    <!-- jQuery -->

</body>

</html>

<script type="text/javascript" src="<?=$themeBaseUrl; ?>/views/dashboard/jcart-1.3/jcart/js/jcart.js"></script>

<script type="text/javascript">
$(document).ready(function(){

    $(document).on("submit", "#jcart", function (e) {
            e.preventDefault();
            var oForm = $(this);
    var formId = oForm.attr("id");
    var firstValue = oForm.find("input").first().val();
    alert("Form '" + formId + " is being submitted, value of first input is: " + firstValue);
    // Do stuff 
    return false;
            //add($(this));
            //e.stopPropagation();
        });

    

  
});
</script>



