 <?php
    $themeBaseUrl = $this->theme->baseUrl;
    $themeRootDir = Yii::getAlias('@themeRootDir');
 ?>

 <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?= $themeBaseUrl;?>/assets/images/banner1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Mouthwatering meals delivered straight to your office.</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?= $themeBaseUrl;?>/assets/images/banner2.jpg');"></div>
                <div class="carousel-caption">
                    <h2>New Menu Everyday</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?= $themeBaseUrl;?>/assets/images/banner1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>The Best in Town</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    