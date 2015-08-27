 
<?php
use yii\helpers\Html;

?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li>
                       <?php echo Html::a('Menu of Week', ['dashboard/resturantmenu']);?>
                       
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                                       
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
        <div class="container week-menu-margin">
            <div class="row">
                <div class="col-md-2"><a class="navbar-brand" href="index.html">Restaurant Logo</a></div>
                <div class="btn-pref btn-group btn-group-lg" role="group" aria-label="...">
                    <div class="btn-group right-line" role="group">
                        <a id="day1" class="btn btn-primary" href="#tab0" data-toggle="tab">
                            <div class="mon"></div>
                            <div class="hidden-xs"><?php echo date('D', strtotime('Monday')); ?></div>
                            <div class="ct-date"><?php echo date('M j', strtotime('Monday')); ?></div>
                        </a>
                    </div>
                    <div class="btn-group right-line" role="group">
                        <a id="day2" class="btn btn-default" href="#tab1" data-toggle="tab">
                            <div class="tue"></div>
                            <div class="hidden-xs"><?php echo date('D', strtotime('Tuesday')); ?></div>
                            <div class="ct-date"><?php echo date('M j', strtotime('Tuesday')); ?></div>
                        </a>
                    </div>
                    <div class="btn-group right-line" role="group">
                        <a id="day3" class="btn btn-default" href="#tab2" data-toggle="tab">
                            <div class="wed"></div>
                            <div class="hidden-xs"><?php echo date('D', strtotime('Wednesday')); ?></div>
                            <div class="ct-date"><?php echo date('M j', strtotime('Wednesday')); ?></div>
                        </a>
                    </div>
                    <div class="btn-group right-line" role="group">
                        <a id="day4" class="btn btn-default" href="#tab3" data-toggle="tab">
                            <div class="thu"></div>
                            <div class="hidden-xs"><?php echo date('D', strtotime('Thursday')); ?></div>
                            <div class="ct-date"><?php echo date('M j', strtotime('Thursday')); ?></div>
                        </a>
                    </div>
                    <div class="btn-group right-line" role="group">
                        <a id="day5" class="btn btn-default" href="#tab4" data-toggle="tab">
                            <div class="fri"></div>
                            <div class="hidden-xs"><?php echo date('D', strtotime('Friday')); ?></div>
                            <div class="ct-date"><?php echo date('M j', strtotime('Friday')); ?></div>
                        </a>
                    </div>
                    <!-- <div class="btn-group right-line" role="group">
                        <a id="day5" class="btn btn-default" href="#tab5" data-toggle="tab">
                            <div class="sat"></div>
                            <div class="hidden-xs"><?php //echo date('D', strtotime('Saturday')); ?></div>
                            <div class="ct-date"><?php //echo date('M j', strtotime('Saturday')); ?></div>
                        </a>
                    </div>  
                    <div class="btn-group" role="group">
                        <a id="day5" class="btn btn-default" href="#tab6" data-toggle="tab">
                            <div class="sun"></div>
                            <div class="hidden-xs"><?php //echo date('D', strtotime('Sunday')); ?></div>
                            <div class="ct-date"><?php //echo date('M j', strtotime('Sunday')); ?></div>
                        </a>
                    </div>            -->                                                     
                </div>
            </div>
        </div>
    </nav>