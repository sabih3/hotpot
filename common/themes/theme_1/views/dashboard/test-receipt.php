<?php
use yii\helpers\Html;

    $themeBaseUrl = $this->theme->baseUrl;
    $themeRootDir = Yii::getAlias('@themeRootDir');
 
    $uploadImageUrl = str_replace('themes/theme_1', '', $themeBaseUrl);

    if(!empty(Yii::$app->session->get('checkOut'))){
        $data = Yii::$app->session->get('checkOut');
    }
    // echo '<pre>';
    // print_r($data);die;
?>
<head>
    <?php
// header("Content-type: application/pdf");
// header("Content-Disposition: filename=\"invoice_$inr.doc\"");
// Header("Expires: Wed, 14 Oct 1997 06:41:40 GMT");
// Header("Cache-control: no-cache");
?>
</head>


    <title>Restaurant Menu</title>


 

    <!-- Custom CSS -->
    <link href="<?= $themeBaseUrl;?>/assets/css/3-col-portfolio.css" rel="stylesheet">
    <link href="<?= $themeBaseUrl;?>/assets/css/add-item-style.css" rel="stylesheet">

    <div class="container">
    <br /><br /><br />
    <?php if(!empty($data)):?>
    <?php foreach ($data as $dataKey => $dataValue): ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <div class="col-lg-11">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2><?= $dataValue['name'];?> for purchase #33221</h2>
                </div>
                <div class="col-lg-1 pull-right">
                    <img height='200' width='100' class="img-responsive" src="<?= $uploadImageUrl.'uploads/' . $dataValue['image_new_url'];?>" alt="">
                </div>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-3 col-lg-12">
                <div class="panel panel-default height">
                    <div class="panel-heading">Meal Description</div>
                    <div class="panel-body">
                        <strong>You currently have  <?= count($dataValue['items']);?> items in your cart</strong><br>
                        <?= date('l', $dataValue['day']);?>'s Menu delivered on (<?= date('Y-m-d', $dataValue['day']);?>)<br>
                        Arlington<br>
                        VA<br>
                        <strong>22 203</strong><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <?php if(!empty($dataValue['items'])): ?>
                            <tbody>
                            
                            <?php foreach ($dataValue['items'] as $key2 => $value2): ?>
                                <tr>
                                    <td><?= $value2['name']; ?></td>
                                    <td class="text-center"><img height='200' width='100' class="img-responsive" src="<?= $uploadImageUrl.'uploads/' . $value2['image_new_url'];?>" alt=""></td>
                                    <td class="text-center"><?= number_format(round($value2['price'], 2), 2);?> Rs.</td>
                                    <td class="text-right"><?= number_format(round($value2['price'], 2), 2);?> Rs.</td>
                                </tr>
                               
                            <?php endforeach; ?>
                        
                             <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Quantity</strong></td>
                                    <td class="highrow text-right"><?= $dataValue['qty'];?></td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Tax</strong></td>
                                    <td class="emptyrow text-right">0.00 Rs.</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Tip</strong></td>
                                    <td class="emptyrow text-right">0.00 Rs.</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-right"><?= number_format(round($dataValue['totalPrice'], 2), 2);?> Rs.</td>
                                </tr>
                                  <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong></strong></td>
                                    <td class="emptyrow text-right"><input id="process-order" type="submit" name='process-order' value="Process Order" class="btn btn-large btn-success"></td>
                                </tr>

                            </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<?php endif; ?>
   <div class="row">
        <div class="col-md-12">
            <?php
                echo '<br /><p>';
                    echo '<small>'. Html::a('Back to dashboard', ['dashboard/resturantmenu'], ['class' => 'btn btn-primary btn-xs']).'</small>';

                echo '</p>';
            ?>
        </div>
    </div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

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

    $('#process-order').click(function(){
        alert('Process order sucessfully. Thank you!');
        window.location.href = '<?php echo Yii::$app->request->baseUrl ?>/index.php?r=dashboard/resturantmenu';
    });

});
</script>

