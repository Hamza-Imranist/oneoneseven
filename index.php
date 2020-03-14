<?php

require_once __DIR__ . '/admin/helpers.php';

$d = getDataset();

?>
<!DOCTYPE html>
<html lang="en" class="no-js">


<!-- Start Head -->
<head>


    <!-- Start Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="text" content="">
    <meta name="author" content="">
    <!-- End Meta -->

    <!--Title -->
    <title><?=(@$d['portfolio_holder_name'] ?: 'Portfolio')?></title>
    <!-- End Title -->

    <!-- Icons -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- End Icons -->


    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/lightbox.css"/>

    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/tooltip.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/progress.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/slideshow.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/uikit.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <!-- End Stylesheets -->


    <style>


        *{
            clear: both;
        }
        .pricing-table{
            display: inline-flex;
            flex-direction: column;
            max-width:480px;
            flex-basis: 0;
            margin: 1rem!important;
            padding: 2rem!important;
            min-width: 185px;
            width: 99%;
            flex-grow:1;
            flex: 1 1 0%;

        }
        .pricing-tab-content-stacked{
            flex-wrap: nowrap!important;
            flex-direction: column!important;
        }
        .pricing-tab-content-stacked .pricing-table{
            margin-left:0!important;
            margin-right:0!important;
            width: 99%%!important;
            min-width: 99%!important;
            max-width: 99%!important;
        }

        .pricing-tab-content{

            justify-content: center;
            /*flex-wrap: wrap;*/
            display: flex;
        }


        .scale-in-ver-center {
            -webkit-animation: scale-in-ver-center 0.175s cubic-bezier(0.895, 0.030, 0.685, 0.220) both;
            animation: scale-in-ver-center 0.175s cubic-bezier(0.895, 0.030, 0.685, 0.220) both;
            will-change: transform;
        }
        .scale-out-ver-center {
            -webkit-animation: scale-out-ver-center 0.175s cubic-bezier(0.895, 0.030, 0.685, 0.220) both;
            animation: scale-out-ver-center 0.175s cubic-bezier(0.895, 0.030, 0.685, 0.220) both;
            will-change: transform;

        }
        .itsgone{
            position: absolute;opacity: 0;
            left:0;
            top:0;
            width: 100%;
	    z-index: -1;
        }
        @-webkit-keyframes scale-in-ver-center {
            0% {
                -webkit-transform: scale(.995);
                transform: scale(.995);
                opacity: 0;

            }
            90% {
                opacity: .075;
            }
            100% {

                -webkit-transform: scaleY(1);
                transform: scaleY(1);
                opacity: 1;
            }
        }

        @keyframes scale-in-ver-center {
            0% {
                -webkit-transform: scale(.995);
                transform: scale(.995);
                opacity: 0;

            }
            90% {
                opacity: .075;
            }
            100% {

                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1;
            }
        }
        @-webkit-keyframes scale-out-ver-center {
            0% {

                -webkit-transform: scaleY(1);
                transform: scaleY(1);
                opacity: 1;
            }
            80% {
                opacity: .1;
            }
            100% {
                -webkit-transform: scaleY(.9);
                transform: scaleY(.9);
                opacity: 0;

            }
        }

        @keyframes scale-out-ver-center {
            0% {

                -webkit-transform: scaleY(1);
                transform: scaleY(1);
                opacity: 1;
            }
            80% {
                opacity: .1;
            }
            100% {
                -webkit-transform: scaleY(.9);
                transform: scaleY(.9);
                opacity: 0;

            }
        }





        #right-work{
            flex-wrap: nowrap;
            overflow-x: auto;
            margin-bottom:4rem!important;
        }
        #right-work > li{
            margin-bottom:0;
        }


        @media screen and (min-width: 1280px){
            .pricing-table:first-child{
                margin-left:0!important;
            }
            .pricing-table:last-child{
                margin-right:0!important;
            }
        }
        @media screen and (max-width: 512px)
        {
            .page-right {
                padding-left: 12%;
            }
        }
        @media screen and (max-width: 480px){
            .pricing-table{
                margin: 0;
                padding: 1.5rem;
            }
            .pricing-tab-content{
                justify-content: center!important;
            }
        }
        @media screen and (max-width: 400px){
            .pricing-table{
                margin: 0;
                padding: 1.5rem;
            }
            .pricing-tab-content{
                justify-content: center!important;
            }
        }
        @media screen and (max-width: 373px)
        {
            .button, .button-white {
                width: 158px;
            }

        }
        @media screen and (max-width: 340px)
        {
            .button, .button-white {
                width: 150px;
            }

        }
        @media screen and (max-width: 322px)
        {
            .button, .button-white {
                width: 140px;
            }

            .pricing-table{
                margin: 0;
                padding: 1rem;
            }
        }
        #pricings-tab{
            margin-bottom: 2rem!important;
        }
        .pricing-tab-selector{
            margin-bottom:0!important;
        }
        .pricing-tab-selector.selected a{
            color: #CDCDCD;
        }
    </style>


</head>


<!-- Main Body -->
<body>



<!-- Container -->
<div class="container">


    <!-- Split Layout -->
    <div id="splitlayout" class="splitlayout">


        <!-- Intro -->
        <div class="intro">

            <!-- Left Home -->
            <div class="side side-left uk-slidenav-position" data-uk-slideshow>

                <!-- Fullscreen Video -->
                <ul class="uk-slideshow uk-slideshow-fullscreen uk-overlay-active">

                    <!-- Video Container -->
                    <li>

                        <!-- Video -->
                        <?php
                        $background_left_is_image = $d['background_left_is_image'] === 'true';
                        if (!$background_left_is_image):
                            ?>
                            <video  playsinline  autoplay="" loop="" muted="" controls="" class="uk-cover-object uk-position-absolute"
                                   width="100%" height="100vh">
                                <source src="video/<?= $d['background_video'] . $d['background_video_extension'] ?>"
                                        type="video/mp4">

                            </video>
                        <?php else: ?>
                            <img
                                    style="object-fit: cover;height: 100vh;width: 100%;"
                                    src="./img/backgrounds/<?= $d['background_left_image'] . $d['background_left_image_extension'] ?>"
                                    alt="">
                        <?php endif; ?>
                        <!-- End Video -->


                        <!-- Content Over Video -->
                        <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade">


                            <!-- Intro Content -->
                            <div class="intro-content">

                                <a class="button-white t-center" href="javascript:void(0)"
                                   id="pricings-button"
                                    onclick="$('#right-pricing').show();$('#left-contact').hide()"
                                >Pricings</a>
                                <p onclick="$('#right-pricing').hide();$('#left-contact').show()"
                                   id="contact-button"
                                        class="button t-center float-c white" style="margin-top: 1rem">Contact</p>

                            </div>
                            <!-- End Intro Content -->

                        </div>
                        <!-- End Content Over Video -->

                    </li>
                    <!-- End Video Container -->

                </ul>
                <!-- End Fullscreen Video -->

            </div>
            <!-- End Left Home -->

            <?php
            $has_background_right = (bool)@$d['background_right_image'];
            ?>
            <!-- Right Home -->
            <div class="side side-right pattern-black <?= ($has_background_right ? '' : 'image-bg-6') ?>">

                <?php if ($has_background_right): ?>
                    <img style="object-fit: cover;
    height: 100vh;
    width: 100%;
    object-position: center;"
                         src="./img/backgrounds/<?= $d['background_right_image'] . $d['background_right_image_extension'] ?>"
                         alt=""
                    >
                    <div style="    width: 100%;
    height: 100vh;
    background: black;
    /* z-index: 0; */
    position: absolute;
    top: 0;
    left: 0;
    opacity: .505;">

                    </div>
                <?php endif; ?>

                <!-- Intro Content -->
                <div class="intro-content">

                    <!-- Intro Image -->
                    <div class="profile available-img"><img src="<?php
                        if (@$d['profile_pic']) {
                            echo "./admin/{$d['profile_pic']}{$d['profile_pic_extension']}";
                        } else {
                            echo "img/profiles/profile4.jpg";
                        }
                        ?>" alt="profile1"/></div>

                    <!-- Intro Name & Title -->
                    <h1 class="uppercase bold f-semi-expanded name no-margin-bottom"><?= $d['portfolio_holder_name'] ?></h1>

                    <div class="separator-center"></div>

                    <p  id="knowmore-button"
                            class="button-white t-center float-c no-margin-bottom">Know More</p>

                </div>
                <!-- End Intro Content -->

            </div>
            <!-- End Right Home -->


        </div>
        <!-- End Intro -->


        <!-- Right Side -->
        <div class="page page-right">

            <!-- Section Container -->
            <div class="page-inner">

                <!-- About -->
                <section id="right-about">

                    <!-- Section Heading -->
                    <div class="section-heading">

                        <!-- Heading -->
                        <h3 class="uppercase f-expanded">I'm <span
                                    class="bold"><?= $d['portfolio_holder_name'] ?>.</span></h3>

                        <!-- Sub Heading -->
                        <h2 class="f-normal gray1"><?= @$d['portfolio_holder_profession'] ?></h2>

                        <!-- Separator -->
                        <div class="separator-small"></div>

                    </div>
                    <!-- End Section Heading -->


                    <!-- Section Content -->
                    <div class="section-content">

                        <!-- Description -->
                        <p><?= @$d['portfolio_bio'] ?></p>

                        <!-- Signature -->
                        <!--<img class="sign" src="img/profiles/liza-sign.png" alt="" />-->

                    </div>

                </section>
                <!-- End About -->


                <!-- Skills -->
                <section id="right-skills">

                    <!-- Section Heading -->
                    <div class="section-heading">

                        <!-- Heading -->
                        <h3 class="uppercase f-expanded">My <span class="bold">Skills.</span></h3>

                        <!-- Sub Heading -->
                        <h2 class="f-normal gray1">Quality doesn't come easy</h2>

                        <!-- Separator -->
                        <div class="separator-small"></div>

                    </div>
                    <!-- End Section Heading -->


                    <!-- Section Content -->
                    <div class="section-content">

                        <?php if (is_array(@$d['skills']) && count(@$d['skills'])) : ?>

                            <?php foreach ($d['skills'] as $id => $skill): ?>
                                <div class="uk-progress">

                                    <!-- Bar -->
                                    <div class="uk-progress-bar uppercase" style="width: <?= $skill['value'] ?>%;">

                                        <?= $skill['name'] ?>

                                        <span class="float-r"><?= $skill['value'] ?>%</span>

                                    </div>
                                    <!-- End Bar -->

                                </div>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <p>No skills added</p>
                        <?php endif; ?>


                    </div>
                    <!-- End Section Content -->

                </section>
                <!-- End Skills -->

                <!-- References -->
                <section id="right-references">

                    <!-- Section Heading -->
                    <div class="section-heading connection-heading">

                        <!-- Heading -->
                        <h3 class="uppercase f-expanded">My <span class="bold">Connections.</span></h3>

                        <!-- Sub Heading -->
                        <h2 class="f-normal gray1">Highly satisfied clients</h2>

                        <!-- Separator -->
                        <div class="separator-small"></div>

                    </div>
                    <!-- End Section Heading -->


                    <!-- Section Content -->
                    <div class="section-content connection-content">

                        <!-- Row -->
                        <div class="references-img" style="margin-bottom: 3rem">

                            <ul data-uk-switcher="{connect:'#right-ref', animation: 'slide-right'}"
                                style="display:flex;flex-direction: row;flex-wrap: nowrap;overflow: hidden;"
                            >

                                <?php foreach ($d['connections'] as $id => $c): ?>
                                    <li style="margin-bottom: 1rem;margin-right: 1rem"
                                        data-img-src="img/references/<?= $id . $c['extension_pic'] ?>"
                                        data-feedback="<?= $c['customer_feedback'] ?>"
                                    ><a href=""><img src="img/references/<?= $id . $c['extension_pic'] ?>"
                                                     alt=""/></a></li>
                                <?php endforeach; ?>
                                <li class="no-margin" id="expand-connections-counter" aria-expanded="false"><a
                                            href=""><h2 class="gray1" id="expand-connections-counter-number">+86</h2>
                                    </a></li>
                            </ul>


                        </div>

                        <div class="references-results">

                            <ul
                                    id="right-ref" class="uk-switcher">
                                <?php foreach ($d['connections'] as $id => $c): ?>
                                    <!-- Switcher Result -->
                                    <li>

                                        <h2 class="gray1 uppercase bold f-normal t-left"><?= $c['customer_name'] ?></h2>
                                        <h3 class="dark uppercase bold f-smaller t-left"><?= $c['customer_position'] ?></h3>
                                        <h3 class="dark uppercase bold f-smaller t-left"><?= $c['customer_company'] ?></h3>

                                        <!-- Separator -->
                                        <div class="separator-smaller"></div>

                                        <p><?= $c['customer_feedback'] ?></p>

                                        <!-- Icon -->
                                        <i class="fa fa-quote-right" aria-hidden="true"></i>


                                    </li>
                                    <!-- End Switcher Result -->
                                <?php endforeach; ?>
                                <li class="more-connction-img no-margin uk-active" aria-hidden="false"
                                    style="animation-duration: 200ms;">



                                </li>

                            </ul>

                        </div>
                        <!-- Row -->

                    </div>
                    <!-- End Section Content -->

                </section>
                <!-- End References -->


                <!-- portfolio -->
                <section id="right-portfolio">

                    <!-- Section Heading -->
                    <div class="section-heading">

                        <!-- Heading -->
                        <h3 class="uppercase f-expanded">My <span class="bold">Works.</span></h3>

                        <!-- Sub Heading -->
                        <h2 class="f-normal gray1">Some of my bests.</h2>

                        <!-- Separator -->
                        <div class="separator-small"></div>

                    </div>
                    <!-- End Section Heading -->


                    <!-- Section Content -->
                    <div class="section-content">


                        <!-- Portfolio Filters -->
                        <ul id="right-work"
                            class="works-filter-portfolio uk-subnav uppercase f-smaller no-margin-bottom">

                           <!-- <li class="no-margin-left" data-uk-filter=""><a href="">All</a></li>-->

                            <li data-uk-filter="filter-images" class="uk-active"><a href="">images</a></li>

                            <li data-uk-filter="filter-videos"><a href="">videos</a></li>

                            <li data-uk-filter="filter-projects"><a href="">projects</a></li>

                        </ul>
                        <!-- End Portfolio Filters -->


                        <!-- Work Previews -->
                        <div data-uk-grid="{controls: '#right-work'}">


                            <?php foreach ($d['gallery'] as $id => $g): ?>

                                <?php if (intval($g['media_type']) === CONTENT_TYPE_IMAGE): ?>
                                    <!-- Work -->
                                    <div class="right-work uk-width-small-1-3 uk-width-medium-1-3" data-uk-filter="<?php
                                    $section = intval($g['media_section']);
                                    switch ($section) {
                                        case 0:
                                            echo "filter-images";
                                            break;
                                        case 1:
                                            echo "filter-videos";
                                            break;
                                        case 2:
                                            echo "filter-projects";
                                            break;
                                        default:
                                            break;
                                    }
                                    ?>">

                                        <!-- Lightbox -->
                                        <a href="<?= "./img/works/$id{$g['extension_thumbnail']}" ?>"
                                           data-redirect-url="<?=@$g['redirect_url']?>"
                                           data-lightbox="works" title="<?= $g['media_title'] ?>">

                                            <!-- Image and Overlay -->
                                            <figure class="uk-overlay uk-overlay-hover">

                                                <!-- Work Image -->
                                                <img
                                                        style="    z-index: 1231231;"
                                                        src="<?= "./img/works/$id{$g['extension_thumbnail']}" ?>" alt=""/>
                                                <!-- End Work Image -->

                                                <!-- Hover Lightbox -->
                                                <figcaption style="z-index: -1" class="uk-overlay-panel uk-overlay-slide-left">

                                                    <div class="hover t-center">

                                                        <!-- Heading -->
                                                        <h2 class="f-normal uppercase"><?= $g['media_title'] ?></h2>

                                                        <!-- Separator -->
                                                        <div class="separator-center dark-bg"></div>

                                                        <!-- Type -->
                                                        <p class="f-smaller uppercase dark bold">Image</p>

                                                    </div>

                                                </figcaption>
                                                <!-- End Hover Lightbox -->

                                            </figure>
                                            <!-- End Image and Overlay -->

                                        </a>
                                        <!-- End Lightbox -->

                                    </div>
                                    <!-- End Work -->
                                <?php elseif (intval($g['media_type']) === CONTENT_TYPE_VIDEO): ?>
                                    <div class="right-work uk-width-small-1-1 uk-width-medium-1-3" data-uk-filter="<?php
                                    $section = intval($g['media_section']);
                                    switch ($section) {
                                        case 0:
                                            echo "filter-images";
                                            break;
                                        case 1:
                                            echo "filter-videos";
                                            break;
                                        case 2:
                                            echo "filter-projects";
                                            break;
                                        default:
                                            break;
                                    }
                                    ?>" data-grid-prepared="true"
                                         style="position: absolute; box-sizing: border-box; top: 0px; opacity: 1; left: 799.25px; display: none;" aria-hidden="true">

                                        <!-- Lightbox -->
                                        <a href="./video/<?= $id . $g['extension_video'] ?>"
                                           data-uk-lightbox="{group:'works'}">

                                            <!-- Image and Overlay -->
                                            <figure class="uk-overlay uk-overlay-hover">

                                                <!-- Work Image -->
                                                <img src="<?= "./img/works/$id{$g['extension_thumbnail']}" ?>" alt="">
                                                <!-- End Work Image -->

                                                <!-- Hover Lightbox -->
                                                <figcaption class="uk-overlay-panel uk-overlay-slide-left">


                                                    <div class="hover t-center">

                                                        <!-- Heading -->
                                                        <h2 class="f-normal uppercase"><?= $g['media_title'] ?></h2>

                                                        <!-- Separator -->
                                                        <div class="separator-center dark-bg"></div>

                                                        <!-- Type -->
                                                        <p class="f-smaller uppercase dark bold">Video</p>

                                                    </div>

                                                </figcaption>
                                                <!-- End Hover Lightbox -->

                                            </figure>
                                            <!-- End Image and Overlay -->

                                        </a>
                                        <!-- End Lightbox -->

                                    </div>

                                <?php endif; ?>
                            <?php endforeach; ?>


                        </div>
                        <!-- End Work Previews -->

                    </div>

                </section>
                <!-- End portfolio -->





            </div>
            <!-- End Section Container -->

        </div>
        <!-- End Right Side -->


        <!-- Left Side -->
        <div class="page page-left">

            <!-- Section Container -->
            <div class="page-inner no-padding-bottom">


                <!-- Contact -->
                <section id="left-contact" class="no-padding-bottom" style="display: none;">


                    <!-- Section Heading -->
                    <div class="section-heading">

                        <!-- Heading -->
                        <h2
                                style="text-align: center!important"
                                class="uppercase f-expanded t-left">Tell us about your <span class="bold">project.</span>
                        </h2>

                        <!-- Sub Heading -->
                        <!--<h2 class="f-normal gray1 t-left">Know the latest news</h2>-->

                        <!-- Separator -->
                        <!--<div class="separator-small"></div>-->

                    </div>
                    <!-- End Section Heading -->


                    <!-- Map -->


                    <!-- Section Content -->
                    <div class="section-content">

                        <!-- Row -->
                        <div class="row">

                            <!-- Column -->
                            <div class="col-md-12">

                                <!-- Contact Container -->
                                <div id="contact-wrapper" style="    justify-content: start;
    display: flex;
    flex-direction: column;
    align-items: start;">

                                    <!-- Comfermation Results -->

                                    <!-- END Comfermation Results -->

                                    <!-- Contact Form -->

                                    <!-- Send Button -->

                                    <!-- END Send Button -->
                                    <?php if (@$d['contact_facebook'] || @$d['contact_telegram'] || @$d['contact_whatsapp']):?>
                                    <p class="dark f-small" style="margin:0 auto;font-size:12px;margin-top:2rem;text-align: left">Contact us on</p>
                                    <!-- END Contact Form -->
                                    <div style="display: flex;flex-direction: row;margin: 0 auto;margin-top:.5rem">
                                        <?php if(@$d['contact_facebook']): ?>
                                            <img    onclick="window.open('https://www.messenger.com/t/<?=$d['contact_facebook']?>/')"
                                                    style="margin: 1rem;cursor:pointer;width: 32px;height: 32px;" src="messenger.svg" alt="">
                                        <?php endif;?>
                                        <?php if(@$d['contact_telegram']): ?>

                                            <img onclick="window.open('<?=$d['contact_telegram']?>')"
                                                    style="margin: 1rem;cursor:pointer;width: 32px;height: 32px;" src="telegram.svg" alt="">
                                        <?php endif;?>
                                        <?php if(@$d['contact_whatsapp']): ?>
                                            <img    onclick="window.open('https://wa.me/<?=$d['contact_whatsapp']?>')"
                                                    style="margin: 1rem;cursor:pointer;width: 32px;height: 32px;" src="whatsapp.svg" alt="">
                                        <?php endif;?>
                                    </div>
                                    <p class="dark f-small" style="margin:0 auto;font-size:12px;margin-top:.5rem;text-align: left">or</p>
                                    <?php endif;?>
                                    <div style="margin:2rem auto; margin-bottom:0">
                                        <button type="button" onclick="window.open('mailto:<?=$d['cta_email']?>')" class="button-dark contact-btn"
                                        >MAIL US</button>
                                    </div>

                                    <p class="dark f-small" style="margin:0 auto;font-size:12px;margin-top:.5rem;text-align: left"><i class="icon ion-ios-information" style="margin-right: 1rem"></i>Please be as
                                        detailed as possible.</p>

                                </div>
                                <!-- END Contact Container -->

                            </div>
                            <!-- End Column -->

                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- End Section Content -->


                </section>

                <?php if (isset($d['pricing']) && is_array($d['pricing']) && count($d['pricing']) > 0): ?>


                    <!-- Pricing -->
                    <section id="right-pricing" style="text-align: left">

                        <!-- Section Heading -->
                        <div class="section-heading">

                            <!-- Heading -->
                            <h3 class="uppercase f-expanded">The <span class="bold">Pricings.</span></h3>

                            <!-- Sub Heading -->
                            <h2 class="f-normal gray1">Quality comes with a price</h2>

                            <!-- Separator -->
                            <div class="separator-small"></div>

                        </div>
                        <!-- End Section Heading -->
                        <ul id="pricings-tab" class="works-filter-portfolio uk-subnav uppercase f-smaller no-margin-bottom">

                            <?php
                            $tabs = [];

                            foreach ($d['pricing'] as $id => $pricing){
                                if (!isset($tabs[$pricing['pricing_tab']]))
                                    $tabs[$pricing['pricing_tab']] = [];
                                $tabs[$pricing['pricing_tab']][] = $pricing;
                            }

                            $tab_count = 0;
                            foreach ($tabs as $tab => $pricing):
                                $tab_count++;
                                ?>
                                <li  class="pricing-tab-selector <?=($tab_count === 1 ? 'selected':'')?>" data-tab="<?=$tab?>"><a href="javascript:void(0)"><?=strtoupper($tab)?></a></li>
                            <?php endforeach;?>

                        </ul>

                        <!-- Section Content -->
                        <div class="section-content" style="position: relative">


                            <?php
                            $tab_count = 0;
                            foreach ($tabs as $tab => $pricings): $tab_count++?>

                                <div class="pricing-tab-content <?=($tab_count === 1 ? 'scale-in-ver-center':'scale-out-ver-center itsgone')?>"

                                     data-tab="<?=$tab?>"
                                    <?php
                                    $pcnt = count($pricings);
                                    if ($pcnt === 1){
                                        echo 'style="justify-content:start;"';
                                    }
                                    ?>
                                >
                                    <?php foreach ($pricings as $pricing): ?>


                                        <!-- Pricing Table -->
                                        <div class="pricing-table"
                                             style="    background-color: <?=$pricing['pricing_background']?>;
                                                     color: <?=$pricing['pricing_color']?>;"
                                        >

                                            <!-- Icon -->
                                            <i class="icon ion-ios-paperplane-outline  f-semi-expanded"></i>

                                            <!-- Heading -->
                                            <h2 class=" uppercase bold f-normal t-left"><?=$pricing['price_name']?></h2>

                                            <!-- Pricing -->
                                            <h3 class="uppercase f-medium bold t-left"><?=$pricing['pricing_price']?> <span class="f-smaller"><?=$pricing['pricing_type']?></span>
                                            </h3>

                                            <!-- Pricing Table Body -->
                                            <div class="table-body">

                                                <?php foreach($pricing['pricing_features'] as $feature) :?>
                                                    <p><?=$feature?></p>

                                                <?php endforeach;?>
                                                <a style="color: <?=$pricing['pricing_color']?>" href="mailto:<?=$d['cta_email']?>?subject=Order Request: <?=ucfirst(strtolower($pricing['pricing_tab'])).' '.ucfirst(strtolower($pricing['price_name']))?>" class="f-smaller bold uppercase">Order Now</a>
                                                <!--<a href="#" class="f-smaller bold uppercase">Order Now</a>-->

                                            </div>
                                            <!-- End Pricing Table Body -->

                                        </div>
                                        <!-- End Pricing Table -->


                                    <?php endforeach; ?>
                                </div>



                            <?php endforeach;?>



                            <!-- Column -->
                            <div style="display: none;" class="col-md-4">


                                <!-- Pricing Table -->
                                <div class="pricing-table dark-bg">

                                    <!-- Icon -->
                                    <i class="icon ion-ios-paperplane white f-semi-expanded"></i>

                                    <!-- Heading -->
                                    <h2 class="white uppercase bold f-normal t-left">Standard</h2>

                                    <!-- Pricing -->
                                    <h3 class="white uppercase f-medium bold t-left">$29.00 <span class="f-smaller">/ hour</span>
                                    </h3>

                                    <!-- Pricing Table Body -->
                                    <div class="table-body white">

                                        <p>50 Pages Website</p>
                                        <p>10 Domain Registration</p>
                                        <p>6 Designers</p>
                                        <p>30 Revisions</p>
                                        <p>24/7 Online Support</p>
                                        <p>Live Chat</p>

                                        <!--<a href="#" class="f-smaller bold uppercase white">Order Now</a>-->

                                    </div>
                                    <!-- End Pricing Table Body -->

                                </div>
                                <!-- End Pricing Table -->


                            </div>
                            <!-- End Column -->


                            <!-- Column -->
                            <div style="display: none;" class="col-md-4">


                                <!-- Pricing Table -->
                                <div class="pricing-table no-margin-bottom">

                                    <!-- Icon -->
                                    <i class="icon ion-ios-paperplane-outline dark f-semi-expanded"></i>

                                    <!-- Heading -->
                                    <h2 class="gray1 uppercase bold f-normal t-left">Ultimate</h2>

                                    <!-- Pricing -->
                                    <h3 class="dark uppercase f-medium bold t-left">$59.00 <span class="f-smaller">/ hour</span>
                                    </h3>

                                    <!-- Pricing Table Body -->
                                    <div class="table-body">

                                        <p>Unlimited Websites</p>
                                        <p>33 Domain Registration</p>
                                        <p>10 Designers</p>
                                        <p>Unlimited Revisions</p>
                                        <p>24/7 Online Support</p>
                                        <p>Live Chat</p>

                                        <!--<a href="#" class="f-smaller bold uppercase">Order Now</a>-->

                                    </div>
                                    <!-- End Pricing Table Body -->

                                </div>
                                <!-- End Pricing Table -->


                            </div>
                            <!-- End Column -->

                            <!--</div>-->
                            <!-- End Row -->

                        </div>
                        <!-- End Section Content -->

                    </section>
                    <!-- End Pricing -->

                <?php endif;?>

                <!-- End Contact -->


            </div>
            <!-- End Section Container -->

        </div>
        <!-- End Left Side -->


        <!-- Back Buttons -->
        <a href="#" class="back back-right" title="back to intro">&rarr;</a>
        <a href="#" class="back back-left" title="back to intro">&larr;</a>
        <!-- End Back Buttons -->


        <!-- Navigation Button for Right Side -->
        <!--<a href="#" class="back back-left" title="back to intro"
           data-uk-offcanvas="{target:'#navigation-right', mode:'push'}" style="top: 15%;">nav</a>-->

        <!-- Off-canvas Navigation -->
        <div id="navigation-right" class="uk-offcanvas">

            <!-- Links -->
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip uk-offcanvas-bar-show">

                <!-- Links -->
                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>


                    <!-- Home Dropdown -->
                    <li class="t-left f-small uppercase"><a href="#right-about" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-home"
                                                                                     aria-hidden="true"></i>
                            <span>Home</span></a></li>

                    <!-- About Link -->
                    <li class="t-left f-small uppercase"><a href="#right-about" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-file-text-o"
                                                                                     aria-hidden="true"></i>
                            <span>About</span></a></li>

                    <!-- Information Link -->
                    <li class="t-left f-small uppercase"><a href="#right-personal" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-info-circle"
                                                                                     aria-hidden="true"></i> <span>Information</span></a>
                    </li>

                    <!-- Experience Link -->
                    <li class="t-left f-small uppercase"><a href="#right-experience" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-eye"
                                                                                     aria-hidden="true"></i> <span>Experience</span></a>
                    </li>

                    <!-- Skills Link -->
                    <li class="t-left f-small uppercase"><a href="#right-skills" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-reorder"
                                                                                     aria-hidden="true"></i> <span>Skills</span></a>
                    </li>

                    <!-- Portfolio Link -->
                    <li class="t-left f-small uppercase"><a href="#right-portfolio" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-area-chart"
                                                                                     aria-hidden="true"></i>
                            <span>Works</span></a></li>

                    <!-- Portfolio Link -->
                    <li class="t-left f-small uppercase"><a href="#right-references" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-external-link"
                                                                                     aria-hidden="true"></i> <span>References</span></a>
                    </li>

                    <!-- Pricing Link -->
                    <li class="t-left f-small uppercase"><a href="#right-pricing" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-money"
                                                                                     aria-hidden="true"></i> <span>Pricing</span></a>
                    </li>

                    <!-- Education Link -->
                    <li class="t-left f-small uppercase"><a href="#right-education" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-graduation-cap"
                                                                                     aria-hidden="true"></i> <span>Education</span></a>
                    </li>

                    <!-- Blog Link -->
                    <li class="t-left f-small uppercase"><a href="#right-blog" class="f-small bold"
                                                            data-uk-smooth-scroll><i class="fa fa-file-text-o"
                                                                                     aria-hidden="true"></i>
                            <span>Blog</span></a></li>

                </ul>

            </div>
            <!-- End Links -->

        </div>
        <!-- End Off-canvas Navigation -->

    </div>
    <!-- End Split Layout -->

</div>
<!-- Container -->


<!-- Javascript Files -->
<script src="js/jquery-3.2.1.min.js"></script>


<script type="text/javascript" >

    $('video').each(function () {
        this.controls = false;
    });
    let $ul = $('.references-img ul');


    let $counterElement = $('#expand-connections-counter');

    let ul_width = $ul.width() - $ul.find(':first-child').outerWidth(true);


    let total_width_occupied = 0;
    let moved_elements_counter = 0;

    let i = 0;

    let last_iteration_element = null;
    let to_finally_move = null;
    $ul.find('li').each(function () {

            total_width_occupied += $(this).outerWidth(true);


            if (total_width_occupied > ul_width) {

                if (this.getAttribute('id') === 'expand-connections-counter'){
                    // move previous element
                    to_finally_move = last_iteration_element;

                }
                else{

                    let feedback = this.getAttribute('data-feedback');
                    let image_src = this.getAttribute('data-img-src');

                    let index= $(this).index();
                    $('#right-ref li:nth-child('+(index+1)+')').remove();


                    // move this element to the other batch
                    $(this).remove();
                    // need to remove the right ref

                    $('li.more-connction-img').append('<a href="javascript:void(0)" data-uk-tooltip title="' + feedback + '"><img src="' + image_src + '" alt="a"></a>');
                    moved_elements_counter++;

                    $('#expand-connections-counter-number').text("+" + moved_elements_counter.toString());
                }

            }

            last_iteration_element = this;
        }
    );



    if (moved_elements_counter === 0) {

        $counterElement.css('display', 'none');
    }


    $('a[data-redirect-url*="."]').each(function () {
        //        console.log($(this).attr('data-redirect-url'));
        let attr = $(this).attr('data-redirect-url');

        if (attr){
            console.log(this);
            $(this).attr('href','javascript:void(0)');
            $(this).on('click',function () {
                window.open(attr);
                return false;
            });


        }
    });


    $('.pricing-tab-selector[data-tab]').each(function () {
        $(this).on('click',function () {
            $('.pricing-tab-selector').removeClass('selected');
            $(this).addClass('selected');
            let data_tab = $(this).attr('data-tab');
            $('.pricing-tab-content:not([data-tab="'+data_tab+'"])').removeClass('scale-in-ver-center').addClass('scale-out-ver-center').delay(175).addClass('itsgone');
            $('.pricing-tab-content[data-tab="'+data_tab+'"]').removeClass('scale-out-ver-center').removeClass('itsgone').addClass('scale-in-ver-center');
        });
    });

    var pricing_table_containers = document.querySelectorAll('.pricing-tab-content');

    function pricingTableResize(){
        let i =0;
        for(let pricing_table_container of pricing_table_containers){
            i++;
            console.log('['+i+'] width: '+pricing_table_container.clientWidth+'; scroll width: '+pricing_table_container.scrollWidth);
            if (pricing_table_container.scrollWidth > pricing_table_container.clientWidth){
                $(pricing_table_container).addClass('pricing-tab-content-stacked');
            }
            else{
                if(pricing_table_container.children.length === 1){
                    pricing_table_container.children[0].style.setProperty('margin-left','0px','important');
                    pricing_table_container.children[0].style.setProperty('margin-right','0px','important');
                }
                $(pricing_table_container).removeClass('pricing-tab-content-stacked');
            }

        }

    }

    setTimeout(pricingTableResize);
    window.onload = function() {

        (function(d) {
            var
                ce = function(e, n) {
                    var a = document.createEvent("CustomEvent");
                    a.initCustomEvent(n, true, true, e.target);
                    e.target.dispatchEvent(a);
                    a = null;
                    return false
                },
                nm = true,
                sp = {
                    x: 0,
                    y: 0
                },
                ep = {
                    x: 0,
                    y: 0
                },
                touch = {
                    touchstart: function(e) {
                        sp = {
                            x: e.touches[0].pageX,
                            y: e.touches[0].pageY
                        }
                    },
//                    touchmove: function(e) {
//                        nm = false;
//                        ep = {
//                            x: e.touches[0].pageX,
//                            y: e.touches[0].pageY
//                        }
//                    },
                    touchmove:function(e){nm=false;ep={x:e.touches[0].pageX,y:e.touches[0].pageY};if(Math.abs(ep.x - sp.x) > 10 && Math.abs(ep.y - sp.y) < 20) e.preventDefault();},
                    touchend: function(e) {
                        if (nm) {
                            ce(e, 'fc')
                        } else {
                            var x = ep.x - sp.x,
                                xr = Math.abs(x),
                                y = ep.y - sp.y,
                                yr = Math.abs(y);
                            if (Math.max(xr, yr) > 100) {
                                ce(e, (xr > yr ? (x < 0 ? 'swl' : 'swr') : (y < 0 ? 'swu' : 'swd')))
                            }
                        };
                        nm = true
                    },
                    touchcancel: function(e) {
                        nm = false
                    }
                };
            for (var a in touch) {
                d.addEventListener(a, touch[a], false);
            }
        })(document);
        //EXAMPLE OF USE
        var h = function(e) {
            console.log(e.type, e)
        };
        document.body.addEventListener('fc', h, false); // 0-50ms vs 500ms with normal click
        document.querySelector('html').addEventListener('swl', function () {
            let $e = $('.splitlayout.mobile-layout.open-left');
            if ($e.length > 0){
                $e.removeClass('reset-layout').removeClass('close-right').removeClass('open-left').addClass('close-left');
            }
            else{
                //open something
                $('#splitlayout').removeClass('reset-layout').addClass('open-right');

            }
        }, false);
        document.querySelector('html').addEventListener('swr', function () {
            let $e = $('.splitlayout.mobile-layout.open-right');
            if ($e.length > 0){
                $e.removeClass('reset-layout').removeClass('close-left').addClass('close-right').removeClass('open-right');
            }
            else{

                $ell = $('#pricings-button')[0];
                $('.splitlayout.mobile-layout').addClass('open-left');
            }
        }, false);
        
        document.body.addEventListener('fc', h, false); // 0-50ms vs 500ms with normal click
        document.body.addEventListener('swl', h, false);
        document.body.addEventListener('swr', h, false);
        document.body.addEventListener('swu', h, false);
        
        /*document.body.addEventListener('swr', h, false);
        document.body.addEventListener('swu', h, false);
        document.body.addEventListener('swd', h, false);*/
        
        let title = document.querySelector(".f-normal").innerHTML;
        let name = document.querySelector(".name").innerHTML;
        document.title = name + " - " + title;
        
        
    }
</script>
<script src="js/modernizr.custom.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/uikit.min.js"></script>

<script src="js/grid.min.js"></script>

<script src="js/slideshow.min.js"></script>

<script src="js/contact.js"></script>

<script src="js/tooltip.min.js"></script>

<script src="js/lightbox.min.js"></script>

<script src="js/lightbox-plus-jquery.min.js"></script>

<script src="js/classie.js"></script>

<script src="js/splitlayout.js"></script>

<script src="js/jquery.mapit.js"></script>

<script src="js/custom.js"></script>
<!-- End JavaSript Files -->

<script>
    
    $('.lb-nav').css('display', 'flex');
    
    </script>
    
    <script defer>

			let connectionContent = document.querySelector(".connection-content");
			let referencesSection = document.querySelector("#right-references");
			if ( connectionContent.textContent = " " ) {

				referencesSection.style.display = "none" ;
			}
			console.log(connectionContent.textContent);
			

		</script>

</body>
<!-- End Main Body -->

</html>