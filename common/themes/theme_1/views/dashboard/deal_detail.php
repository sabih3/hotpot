<?php
use yii\helpers\Html;

    $themeBaseUrl = $this->theme->baseUrl;
    $themeRootDir = Yii::getAlias('@themeRootDir');
 
    $uploadImageUrl = str_replace('themes/theme_1', '', $themeBaseUrl);

    // echo '<pre>';
    // print_r($data);die;
?>



    <title>Restaurant Menu</title>

    <!-- Bootstrap Core CSS -->
 

    <!-- Custom CSS -->
    <link href="<?= $themeBaseUrl;?>/assets/css/3-col-portfolio.css" rel="stylesheet">
    <link href="<?= $themeBaseUrl;?>/assets/css/add-item-style.css" rel="stylesheet">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



 
    <!-- Page Content -->
    <div class="container"><a name="MyTarget1"></a>
    <?php if(!empty($data)): ?>
    <?php foreach ($data as $dataKey => $dataValue): ?>
    
    <h1 class="page-header"><?php if(!empty($dataValue['name'])) echo $dataValue['name'];?></h3></h1>

        <div class="row">
            <div class="col-md-4 portfolio-item pull-left">
                <img height="400" width="340" class="img-responsive" src="<?= $uploadImageUrl.'uploads/' . $dataValue['image_new_url'];?>" alt="">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                        <?php if(!empty($dataValue['items'])): ?>
                         <?php foreach ($dataValue['items'] as $key => $value): ?>
                            <div class="col-lg-6">
                                <?= $value['name'];?>
                                <p class="lead section-lead"><img height="100" width="200" class="img-responsive" src="<?= $uploadImageUrl.'uploads/' . $value['image_new_url'];?>" alt=""></p>
                                </div>
                                
                          <!--   </div>
                                  <div class="col-lg-4">
                                <p class="lead section-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                
                            </div>
                                  <div class="col-lg-4">
                                <p class="lead section-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                
                            </div> -->
                        <?php endforeach; ?>
                    <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                    <hr /><br /><br />
                        <label for="name">QTY</label>
                        <input type="text" name="add-item-qty" id="add-item-qty_<?= $dataValue['id'];?>" class="add-item-qty" value="1">
                        <div class="inc button">+</div>
                        <div class="dec button">-</div>
                    </div>
                </div>
                
                   <!--  <div class="round round-lg">
                        <a href="#"><span class="glyphicon glyphicon-plus-sign add-item button"></span></a>
                    </div>
                    <div class="round round-lg">
                        <a href="#"><span class="glyphicon glyphicon-minus-sign minus-item button"></span></a>
                   
                    </div> -->
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
    </div>
      
    <!-- jQuery -->
</body>

</html>

<script type="text/javascript">
$(document).ready(function(){


    $(".button").on("click", function() {

        

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } 
        else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } 
            else {
                newVal = 0;
            }
        }

        $button.parent().find("input").val(newVal);
        <?php //Yii::$app->session->set();?>
            
    });

    $('button.btn').click(function(){
            var id = $('.add-item-qty').attr('id');
            var meal_id = id.split('_')[1];
            var qty = $('.add-item-qty').val();
            var csrfToken = $('meta[name="csrf-token"]').attr("content");

            $.ajax({
                type: "POST",
                url: '<?php echo Yii::$app->request->baseUrl ?>/index.php?r=dashboard/checkoutreponse',
                data: { id: meal_id, _csrf: csrfToken, qty: qty},
                success: function(data) {
                    alert('Check out order successfully');
                    if(data == 'success'){
                        window.location.href = '<?php echo Yii::$app->request->baseUrl ?>/index.php?r=dashboard/test';
                    }
                    // $('#profileCompletnessSuggesstoin').html(data);
                    // $('input.knob').attr('value', profileCompletness()).trigger('change');
                    
                },
                // error: function() {
                //     alert('it broke');
                // },
                complete: function() {
                    alert('it completed');
                }
            });
    });

});
</script>

