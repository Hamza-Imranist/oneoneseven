<?php

// Credentials


$admin_username = "admin";
$admin_password = "admin";

// Helpers file

set_time_limit(0);



require_once __DIR__ . '/helpers.php';


// AUTHENTICATION - we're using Basic HTTP Auth
verifyAuthentication($admin_username, $admin_password);


// Get Dataset

$d = getDataset();






parsePost($_POST, $d);




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/css/froala_editor.pkgd.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="./../fonts/fontawesome/css/all.min.css">
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/js/froala_editor.pkgd.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid p-4 d-flex flex-column">


    <!--PORTFOLIO -->
    <div class="my-3">
        <a class="btn btn-secondary" href="index.php">Refresh</a>
    </div>

    <form action="index.php" method="POST" class="d-flex flex-column" enctype="multipart/form-data">
        <h4 class="mb-3">Website settings</h4>
        <h6>Background (Left Side)</h6>
        <input type="hidden" name="action" value="save_website_settings"/>

        <input type="file" class="d-none" name="background_left_image" id="background_left_image"
               onchange="this.parentElement.submit()"
               accept="image/*"/>

        <input type="file" class="d-none" name="background_right_image" id="background_right_image"
               onchange="this.parentElement.submit()"
               accept="image/*"/>

        <input type="file" class="d-none" name="background_video" accept="video/*" id="background_video" onchange="this.parentElement.submit()"/>

        <?php
            $background_left_is_image = @$d['background_left_is_image'] === 'true';
            $has_background_right = (bool)@$d['background_right_image'];
            $has_background_left = (bool)@$d['background_left_image'];
        ?>
        
        
        <div class="d-flex flex-row">
            <div class="form-group" type="radio">
                <input type="radio" <?=($background_left_is_image ? 'checked' : '')?> id="background_left_is_image" onchange="onWebsiteLeftBackgroundChange(this.value)" value="true" name="background_left_is_image" />
                <label for="background_left_is_image"
                    onclick="$('#background_left_is_image').click()"
                >Image</label>
            </div>

            <div class="form-group ml-3" type="radio">
                <input type="radio" <?=($background_left_is_image ? '' : 'checked')?> id="background_left_is_video" onchange="onWebsiteLeftBackgroundChange(this.value)" value="false" name="background_left_is_image" />
                <label for="background_left_is_video"
                       onclick="$('#background_left_is_video').click()"
                >Video Animation</label>
            </div>
        </div>

        <img    id="background-image-left-presentation"
                alt="" style="width: 64px;height: 64px;cursor:pointer;<?=($background_left_is_image?'':'display:none;')?>"
             onclick="$('#background_left_image').click()"
            src="<?php
        if ($has_background_left) {
            echo "../img/backgrounds/{$d['background_left_image']}{$d['background_left_image_extension']}";
        } else {
            echo "../img/profiles/profile4.jpg";
        }
        ?>">



        <div id="video-animation-left-presentation" style="<?=($background_left_is_image?'display:none;':'')?>">
            <p>Uploaded Video Path:</p>
            <?php $has_background_left_video =  (bool)@$d['background_video']; ?>

            <?php if ($has_background_left_video): ?>
                <p
                        class="<?=($has_background_left_video ? '' : 'd-none')?>"
                >/video/<?=($has_background_left_video ? $d['background_video'].$d['background_video_extension'] : '')?></p>
            <?php else: ?>
                <p>No video uploaded</p>
            <?php endif;?>

            <button class="btn btn-primary btn-sm" type="button"
                onclick="$('#background_video').click()"
            >Upload Video</button>

        </div>
        <h6 class="mt-5">Background (Right Side)</h6>
        <img    id="background-image-right-presentation"
                alt="" style="width: 64px;height: 64px;cursor:pointer;"
                onclick="$('#background_right_image').click()"
                src="<?php
                if ($has_background_right) {
                    echo "../img/backgrounds/{$d['background_right_image']}{$d['background_right_image_extension']}";
                } else {
                    echo "../img/profiles/profile4.jpg";
                }
                ?>">
        <h6 class="mt-5">CTA Email</h6>
        <input type="text" class="form-control" name="cta_email" placeholder="mail@email.com"
               value="<?=@$d['cta_email']?>"
        />

        <h6 class="mt-5">Facebook Profile ID (for Contact) <a href="https://imgur.com/MWP0V1M" target="_blank">How to find it?</a></h6>
        <input type="text" class="form-control" name="contact_facebook" placeholder="892437873241238"
               value="<?=@$d['contact_facebook']?>"
        />

        <h6 class="mt-5">Whatsapp Number (for Contact)</h6>
        <input type="text" class="form-control" name="contact_whatsapp" placeholder="393387624124"
               value="<?=@$d['contact_whatsapp']?>"
        />

        <h6 class="mt-5">Telegram t.me link (for Contact)</h6>
        <input type="text" class="form-control" name="contact_telegram" placeholder="https://t.me/whoknows"
               value="<?=@$d['contact_telegram']?>"
        />
        <div class="d-flex flex-row mb-4 mt-3">
            <button class="btn btn-success" type="submit">Save Website Settings</button>
        </div>
    </form>
    <hr class="" style="height: 1px;width: 100%;">
    <form action="index.php" method="POST" class="d-flex flex-column mt-5">
        <h4 class="mb-3">Portfolio</h4>
        <input type="hidden" name="action" value="save_portfolio"/>
        <h6>Profile picture (350x350) - Click the IMG to change</h6>
        <div class="d-flex flex-column mb-3">
            <img    onclick="$('#upload-profile-pic').click()"
                    src="<?php
            if (@$d['profile_pic']) {
                echo "./{$d['profile_pic']}{$d['profile_pic_extension']}";
            } else {
                echo "../img/profiles/profile4.jpg";
            }
            ?>" alt="" style="width: 64px;height: 64px; border-radius: 50%;cursor:pointer">

            <input id="upload-profile-pic"
                   accept="image/*"

                   class="d-none" type="file" onchange="updateProfilePic(this)">

        </div>
        <h6>Full name</h6>
        <div class="row m-0 p-0">
            <input name="portfolio_holder_name" type="text" class="form-control col-8 col-lg-4 col-xl-3"
                   value="<?= @$d['portfolio_holder_name'] ?>"/>
        </div>


        <h6 class="mt-3">Profession / Title</h6>
        <div class="row m-0 p-0">

            <input name="portfolio_holder_profession" type="text" class="form-control col-8 col-lg-4 col-xl-3"
                   value="<?= @$d['portfolio_holder_profession'] ?>"/>
        </div>

        <h6 class="mt-3">Bio</h6>
        <textarea id="froala-editor" rows="5" name="portfolio_bio" type="text"
                  class="form-control"><?= @$d['portfolio_bio'] ?></textarea>
        <!--END PORTFOLIO-->

        <div class="d-flex flex-row mb-4 mt-3">
            <button class="btn btn-success" type="submit">Save Portfolio Info</button>
        </div>

    </form>

    <h4 class="my-3 mt-5">Skills</h4>


    <?php if (is_array(@$d['skills']) && count(@$d['skills'])) : ?>

        <?php foreach ($d['skills'] as $id => $skill): ?>
            <div class="d-flex flex-row align-items-center">
                <span><?= $skill['name'] ?> (<?= $skill['value'] ?>%)</span>
                <button type="button" class="btn btn-default"
                        onclick="deleteSkill('<?= $id ?>')"
                >Delete
                </button>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <p>No skills added</p>
    <?php endif; ?>

    <h6 class="mt-3">Add skill</h6>
    <div class="row m-0 align-items-center">
        <input name="add_skill_name" type="text" class="form-control col-8 col-lg-4 col-xl-3"
               placeholder="Skill name"/>

        <span class="mx-3">%</span>
        <input name="add_skill_perc" type="number" class="form-control col-4 col-lg-2 col-xl-1"
               step="1"
               min="0"
               max="100"
               value="100"
               placeholder=""/>
        <button type="button" onclick="addSkill()" class="btn btn-dark-green ml-3">Add</button>
    </div>


    <h4 class="mb-3 mt-5">Gallery</h4>
    <a href="javascript:void(0)" class="my-3 h6" onclick="$('#add-content-to-gallery').toggleClass('d-none')">Add content to gallery</a>





    <div class="flex-column d-none rounded border" id="add-content-to-gallery" style="display: inline-flex">
        <div class="p-2 d-inline-flex flex-row">

            <span class=text-muted>Title (should be short)</span>

            <input class="form-control ml-3 col-8 col-lg-4 col-xl-3" type="text"
                   id="gallery_add_content_short_title"/>
        </div>

        <div class=" p-2 d-inline-flex flex-row">

            <span class=text-muted>Thumbnail (700x700)</span>

            <input class="ml-3 col-8 col-lg-4 col-xl-3" type="file"
                   accept="image/*"
                   id="thumbnail_file_input">
        </div>

        <div class=" p-2 d-inline-flex flex-row align-items-center justify-content-start">

            <span class="text-muted flex-grow-0 text-nowrap">Gallery tab section</span>
            <select class="form-control flex-grow-0 ml-3 col-8 col-lg-4 col-xl-3"
                id="gallery_media_section"
            >
                <option selected value="<?=SECTION_IMAGES?>">Images</option>
                <option value="<?=SECTION_VIDEOS?>">Videos</option>
                <option value="<?=SECTION_PROJECTS?>">Projects</option>
            </select>

        </div>

        <div class="r p-2 d-inline-flex flex-row align-items-center justify-content-start">

            <span class="text-muted flex-grow-0 text-nowrap">Media type</span>
            <select class="form-control flex-grow-0 ml-3 col-8 col-lg-4 col-xl-3"
                    id="gallery_media_type"
                onchange="onMediaTypeChange(this.value)"
            >
                <option selected value="<?=CONTENT_TYPE_IMAGE?>">Image</option>
                <option value="<?=CONTENT_TYPE_VIDEO?>">Video (upload)</option>
            </select>

        </div>

        <div class=" p-2 d-inline-flex flex-row align-items-center justify-content-start">
            <span class="text-muted flex-grow-0 text-nowrap">Source</span>
            <input name="media_source_yt_input" id="media_source_yt_input" type="text" class="form-control col-8 col-lg-4 col-xl-3 ml-3" disabled
                   placeholder="Same as thumbnail"/>

            <input name="media_source_file_input" id="media_source_file_input" type="file"
                   accept="video/*"
                   class="form-control col-8 col-lg-4 col-xl-3 ml-3"
                   style="display: none"
                   placeholder="Same as thumbnail"/>

        </div>

        <div class="p-2 d-inline-flex flex-row">

            <span class=text-muted>Redirect on click URL (optional)</span>

            <input class="form-control ml-3 col-8 col-lg-4 col-xl-3" type="text"
                   placeholder="Leave empty if you don't want to redirect on click"
                   id="gallery_add_content_url_redirect" />
        </div>
        <div class="m-3">
            <button class="btn btn-success" type="button" onclick="addToGallery()"><i class="fas fa-circle-notch fa-spin d-none mr-3"
                                                                                      id="add-to-gallery-load"
                ></i>Add to gallery</button>
            <button class="btn btn-default" type="button" onclick="cancelAddContentToGallery()">cancel</button>
        </div>

    </div>






    <table class="table">
        <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Type</th>
            <th>Gallery Section Tab</th>
            <th>Source</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php if (is_array($d['gallery'])):
                    foreach($d['gallery'] as $id => $g):
                ?>
                <tr>
                    <td>
                        <img    style="width: 64px;height: 64px;"
                                src="../img/works/<?=$id?><?=$g['extension_thumbnail']?>" alt="">
                    </td>
                    <td>
                        <?=$g['media_title']?>
                    </td>
                    <td>
                        <?php
                            switch ($g['media_type']){
                                case CONTENT_TYPE_IMAGE:
                                    echo "Image".(@$g['redirect_url'] ? ' [URL REDIRECT]' : '');
                                    break;
                                case CONTENT_TYPE_VIDEO:
                                    echo "Video";
                                    break;
                                case CONTENT_TYPE_VIDEO_YOUTUBE:
                                    echo "Youtube Video";
                                    break;
                            }
                        ?>
                    </td>
                    <td><?php
                        switch ($g['media_section']){
                            case SECTION_IMAGES:
                                echo "Images";
                                break;
                            case SECTION_PROJECTS:
                                echo "Projects";
                                break;
                            case SECTION_VIDEOS:
                                echo "Videos";
                                break;
                        }
                    ?></td>
                    <th>
                        <?php
                        switch ($g['media_type']){
                            case CONTENT_TYPE_IMAGE:
                                echo "Same as thumbnail";
                                break;
                            case CONTENT_TYPE_VIDEO:
                                echo"/video/{$id}{$g['extension_video']}";
                                break;
                            case CONTENT_TYPE_VIDEO_YOUTUBE:
                                echo "Youtube Video";
                                break;
                        }
                        ?>
                    </th>
                    <th>
                        <div class="d-flex flex-column">
                            <button class="btn btn-default"
                                    onclick="moveUpGallery('<?=$id?>')"
                            >Move up</button>
                            <button class="btn btn-default"
                                    onclick="moveDownGallery('<?=$id?>')"
                            >Move down</button>
                            <button class="btn btn-default"
                                    onclick="deleteGalleryContent('<?=$id?>')"
                            >Delete</button>
                        </div>
                    </th>
                </tr>
            <?php endforeach;
            endif;?>
        </tbody>
    </table>


    <h4 class="mb-3 mt-5">Connections</h4>
    <a href="javascript:void(0)" class="my-3 h6" onclick="$('#add-connection').toggleClass('d-none')">Add connection</a>
    <div id="add-connection" class="d-none flex-column rounded border " style="display: inline-flex">
        <div class=" p-2 d-inline-flex flex-row">

            <span class=text-muted>Thumbnail (350x350)</span>

            <input class="ml-3 col-8 col-lg-4 col-xl-3 form-control-file"  type="file"
                   accept="image/*"
                   id="connection_thumbnail">
        </div>

        <div class="p-2 d-inline-flex flex-row">

            <span class=text-muted>Customer name</span>

            <input class="ml-3 col-8 col-lg-4 col-xl-3 form-control" type="text"
                   id="customer_name"/>
        </div>
        <div class="p-2 d-inline-flex flex-row">

            <span class=text-muted>Customer Position</span>

            <input class="ml-3 col-8 col-lg-4 col-xl-3 form-control" type="text"
                   id="customer_position"/>
        </div>

        <div class="p-2 d-inline-flex flex-row">

            <span class=text-muted>Customer Company</span>

            <input class="ml-3 col-8 col-lg-4 col-xl-3 form-control" type="text"
                   id="customer_company"/>
        </div>

        <div class="p-2 d-inline-flex flex-row">

            <span class=text-muted>Customer Feedback</span>

            <textarea rows="3" class="ml-3 col-8 col-lg-4 col-xl-3 form-control"
                   id="customer_feedback"></textarea>
        </div>
        <div class="m-3">
            <button class="btn btn-success" type="button" onclick="addConnection()"><i class="fas fa-circle-notch fa-spin d-none mr-3"
                                                                                      id="add-connection-load"
                ></i>Add to connection</button>
            <button class="btn btn-default" type="button" onclick="cancelAddConnection()">cancel</button>
        </div>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Customer Name</th>
            <th>Customer Position</th>
            <th>Position Company Name</th>
            <th>Feedback Message</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($d['connections'] as $id => $connection): ?>
                <tr>
                    <td>
                        <img
                                style="width: 64px;height: 64px;border-radius:50%;"
                                src="../img/references/<?=$id.$connection['extension_pic']?>" alt="">
                    </td>
                    <td>
                        <?=$connection['customer_name']?>
                    </td>
                    <td>
                        <?=$connection['customer_position']?>
                    </td>
                    <td>
                        <?=$connection['customer_company']?>
                    </td>
                    <td>
                        <?=$connection['customer_feedback']?>
                    </td>

                    <td>
                        <div style="display: flex;flex-direction: column">
                            <button class="btn btn-default"
                                    onclick="moveUpConnection('<?=$id?>')"
                            >Move up</button>
                            <button class="btn btn-default"
                                    onclick="moveDownConnection('<?=$id?>')"
                            >Move down</button>
                            <button class="btn btn-default" type="button" onclick="deleteConnection('<?=$id?>')">Delete</button>
                        </div>

                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>




    <h4 class="mb-3 mt-5">Pricing tables</h4>
    <a href="javascript:void(0)" class="my-3 h6" onclick="$('#add-pricing').toggleClass('d-none')">Add Pricing Table</a>

    <div id="add-pricing" class="d-none flex-column rounded border " style="display: inline-flex">
        <div class=" p-2 d-inline-flex flex-row align-items-center">

            <span class=text-muted>Name</span>

            <input class="ml-3 col-8 col-lg-4 col-xl-3 form-control"  type="text"
                   placeholder="Ex. STARTER"
                   id="pricing_name"/>
        </div>

        <div class=" p-2 d-inline-flex flex-row align-items-center">

            <span class=text-muted>Price</span>

            <input class="ml-3 col-8 col-lg-4 col-xl-3 form-control"  type="text"
                   placeholder="Ex. $19.21 or €18,32 (it can be any text)"
                   id="pricing_price"/>
        </div>


        <div class=" p-2 d-inline-flex flex-row align-items-center">

            <span class=text-muted>Pricing Type</span>

            <input class="ml-3 col-12 col-lg-5 col-xl-4 form-control"  type="text"
                   placeholder="Ex. {/ month} or {/ day} without {}, or leave empty"
                   id="pricing_type"/>
        </div>

        <div class=" p-2 d-inline-flex flex-row align-items-center">

            <span class=text-muted>Features</span>

            <input class="ml-3 col-12 col-lg-5 col-xl-4 form-control"  type="text"
                   placeholder="Feature One;Feature Two;24/7 Support"
                   id="pricing_features"/>
        </div>

        <div class=" p-2 d-inline-flex flex-row align-items-center">

            <span class=text-muted>Service Tab</span>

            <input class="ml-3 col-12 col-lg-5 col-xl-4 form-control"  type="text"
                   placeholder="Ex. SEO or Design"
                   id="pricing_tab"/>
        </div>
        <div class=" p-2 d-inline-flex flex-row align-items-center">

            <span class=text-muted>Background Color HEX</span>

            <input class="ml-3 col-12 col-lg-5 col-xl-4 form-control"  type="text"
                   placeholder="#FFFFFF"
                   value="#FFFFFF"
                   id="pricing_background"/>
        </div>

        <div class=" p-2 d-inline-flex flex-row align-items-center">

            <span class=text-muted>Text Color HEX</span>

            <input class="ml-3 col-12 col-lg-5 col-xl-4 form-control"  type="text"
                   placeholder="#191919"
                   value="#191919"
                   id="pricing_color"/>
        </div>

        <div class="m-3">
            <button class="btn btn-success" type="button" onclick="addPriceTable()"><i class="fas fa-circle-notch fa-spin d-none mr-3"
                                                                                       id="add-connection-load"
                ></i>Add to connection</button>
        </div>


    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Pricing Type</th>
            <th>Features</th>
            <th>Service TAB</th>
            <th>Theme</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

                <?php if (isset($d['pricing']) && is_array($d['pricing'])):?>
                    <?php foreach($d['pricing'] as $id => $p):?>
                    <tr>
                        <td><?=$p['price_name']?></td>
                        <td><?=$p['pricing_price']?></td>
                        <td><?=$p['pricing_type']?></td>
                        <td><?=implode('<br>',$p['pricing_features'])?></td>
                        <td class="text-uppercase"><?=$p['pricing_tab']?></td>
                        <td>Background: <?=$p['pricing_background']?><br>Text color: <?=$p['pricing_color']?></td>
                        <td>
                            <div style="display: flex;flex-direction: column">
                                <button class="btn btn-default"
                                        onclick="moveUpPricing('<?=$id?>')"
                                >Move up</button>
                                <button class="btn btn-default"
                                        onclick="moveDownPricing('<?=$id?>')"
                                >Move down</button>
                                <button class="btn btn-default" type="button" onclick="deletePricing('<?=$id?>')">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                <?php endif;?>

        </tbody>
    </table>


</div>

<script>
    new FroalaEditor('textarea#froala-editor')


    function addSkill() {

        let $skillName = $('input[name="add_skill_name"]');
        let $skillPerc = $('input[name="add_skill_perc"]');
        let skill_name = $skillName.val();
        let skill_perc = parseFloat($skillPerc.val());
        if (!skill_name) {
            alert('Skill name too short');
            return false;
        }
        if (skill_perc < 0 || skill_perc > 100) {
            alert('Skill percentage must be 0-100');
            return false;
        }

        $.ajax({
            url: './',
            method: 'post',
            data: {
                action: "add_skill",
                name: skill_name,
                value: skill_perc
            },
            success: function (d) {
                if (d === 'ok') {
                    window.location.reload();
                }
            }
        })

    }


    function addPriceTable(){
        let price_name = $('#pricing_name').val().trim();
        let pricing_price = $('#pricing_price').val().trim();
        let pricing_type = $('#pricing_type').val().trim();
        let pricing_features = $('#pricing_features').val().trim();
        let pricing_background = $('#pricing_background').val().trim();
        let pricing_color = $('#pricing_color').val().trim();
        let pricing_tab = $('#pricing_tab').val().trim().toLowerCase();

        if (!price_name) {
            alert('Name should be longer');
            return false;
        }
        if (!pricing_price) {
            alert('Please input a price');
            return false;
        }
        if (!pricing_features){
            alert('Please input at least one feature');
            return false;
        }
        else{
            pricing_features = pricing_features.split(';').map(function (item) {
                return item.trim();
            }).filter(c=> c.length > 0);
        }
        if (!pricing_tab){
            alert('Please input a tab name for service type');
            return false;
        }
        if (!pricing_background){
            pricing_background = "#FFFFFF";
        }
        if (!pricing_color){
            pricing_color = "#191919";
        }
        $.ajax({
            url: './',
            method: 'post',
            data: {
                action: "add_pricing",
                price_name: price_name,
                pricing_price: pricing_price,
                pricing_type: pricing_type,
                pricing_features: pricing_features,
                pricing_background: pricing_background,
                pricing_color: pricing_color,
                pricing_tab:pricing_tab

            },
            success: function (d) {
                if (d === 'ok') {
                    window.location.reload();
                }
            }
        });
    }

    function deleteSkill(id) {
        $.ajax({
            url: './',
            method: 'post',
            data: {
                action: "remove_skill",
                value: id
            },
            success: function (d) {
                if (d === 'ok') {
                    window.location.reload();
                }
            }
        });
    }


    window.getBase64 = function (element) {
        return new Promise(function (resolved) {
            if (!element.files || element.files.length !== 1)
                resolved("");
            let reader = new FileReader();
            let selectedFile = element.files[0];

            reader.onload = function () {
                let comma = this.result.indexOf(',');
                resolved(this.result.substr(comma + 1));

            };
            reader.readAsDataURL(selectedFile);
        });
    };



    async function updateProfilePic(el) {



        let form_data = new FormData();
        form_data.append('action','change_profile_pic');
        form_data.append('profile_pic',el.files[0]);
        $.ajax({
            method: "POST",
            url: "./",
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: form_data
        });
    }


    function onMediaTypeChange(selected_value){
        $mediaSourceInput = $('#media_source_yt_input');
        $mediaSourceFileInput =$('#media_source_file_input');

        switch (selected_value) {
            case '0':
                $mediaSourceInput.attr('disabled','true');
                $mediaSourceInput.attr('placeholder','Same as thumbnail');
                $mediaSourceInput.show();
                $mediaSourceFileInput.hide();
                break;
            case '1':
                $mediaSourceInput.hide();
                $mediaSourceFileInput.show();
                break;
            case '2':
                $mediaSourceInput.removeAttr('disabled');
                $mediaSourceInput.attr('placeholder','https://www.youtube.com/watch?v=qSQQc6R35kw');
                $mediaSourceInput.show();
                $mediaSourceFileInput.hide();
                break;
        }
    }

    function addConnection(){


        // check if thumbnail has been loade
        let connection_thumbail_el = $('#connection_thumbnail')[0];
        if (!connection_thumbail_el.files || connection_thumbail_el.files.length !== 1){
            alert('You must choose a thumbnail for the customer');
            return;
        }


        let connection_thumbail_file = connection_thumbail_el.files[0];


        let customer_name = $('#customer_name').val();
        if (!customer_name){
            alert('You must input the customer name');
            return;
        }


        let customer_position = $('#customer_position').val();
       /* if (!customer_position){
            alert('You must input the customer position');
            return;
        }*/

        let customer_company = $('#customer_company').val();
     /*   if (!customer_company){
            alert('You must input the customer company');
            return;
        }*/

        let customer_feedback = $('#customer_feedback').val();
        if (!customer_feedback){
            alert('You must input the customer feedback');
            return;
        }




        $('#add-connection-load').removeClass('d-none');
        let form_data = new FormData();
        form_data.append('customer_name', customer_name);
        form_data.append('customer_position', customer_position);
        form_data.append('customer_company', customer_company);
        form_data.append('customer_feedback',customer_feedback);
        form_data.append('action','add_connection');
        form_data.append('pic',connection_thumbail_file);

        $.ajax({
            method: "POST",
            url: "./",
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: form_data
        });
    }

    function deleteConnection(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: {
                action:'delete_customer_connection',
                id:id
            }
        });
    }

    function deletePricing(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: {
                action:'delete_pricing',
                id:id
            }
        });
    }

    function moveUpConnection(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: {
                action:'move_up_connection',
                id:id
            }
        });
    }
    function moveUpPricing(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: {
                action:'move_up_pricing',
                id:id
            }
        });
    }
    function moveUpGallery(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: {
                action:'move_up_gallery',
                id:id
            }
        });
    }

    function moveDownConnection(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: {
                action:'move_down_connection',
                id:id
            }
        });
    }

    function moveDownPricing(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: {
                action:'move_down_pricing',
                id:id
            }
        });
    }

    function moveDownGallery(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                if (data !== 'ok'){
                    alert(data);
                    return;
                }
                window.location.reload();
            },
            data: {
                action:'move_down_gallery',
                id:id
            }
        });
    }
    function cancelAddConnection(){

    }
    async function addToGallery(){

        let thumbnailInput = $('#thumbnail_file_input')[0];

        if (!thumbnailInput.files || thumbnailInput.files.length !== 1){
            alert('You must choose a thumbnail');
            return;
        }
        let media_type= $('#gallery_media_type')[0].value;
        let media_section = $('#gallery_media_section')[0].value;
        let media_title = $('#gallery_add_content_short_title')[0].value;
        let redirect_url = $('#gallery_add_content_url_redirect')[0].value;

        if (!media_title){
            alert('Please input a title');
            return;
        }

        switch (media_type) {
            case '0': //image
                // source is equal to thumbnail
                $('#add-to-gallery-load').removeClass('d-none');

                let form_data = new FormData();
                form_data.append('media_type', media_type);
                form_data.append('media_title', media_title);
                form_data.append('media_section',media_section);
                form_data.append('action','add_gallery_content');
                form_data.append('redirect_url',redirect_url);
                form_data.append('thumbnail',thumbnailInput.files[0]);
                $.ajax({
                    method: "POST",
                    url: "./",
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data !== 'ok'){
                            alert(data);
                            return;
                        }
                        window.location.reload();
                    },
                    data: form_data
                });


                break;
            case '1': //video

                sourceFileInput = $('#media_source_file_input')[0];
                if (
                    ValidateSingleInput(
                        sourceFileInput
                    )
                ){

                    $('#add-to-gallery-load').removeClass('d-none');

                    let form_data = new FormData();
                    form_data.append('media_type', media_type);
                    form_data.append('media_title', media_title);
                    form_data.append('media_section',media_section);
                    form_data.append('action','add_gallery_content');
                    form_data.append('thumbnail',$('#thumbnail_file_input')[0].files[0]);
                    form_data.append('video',sourceFileInput.files[0]);
                    $.ajax({
                        method: "POST",
                        url: "./",
                        dataType: 'text',  // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            if (data !== 'ok'){
                                alert(data);
                                return;
                            }
                            window.location.reload();
                        },
                        data: form_data
                    });
                }
                else{
                    alert ('Must upload one of these video types: .mp4, .webm, .webp, .m4p, .m4v');
                }
                break;
            case '2': //video yt
                break;


        }
    }

    var _validFileExtensions = [".mp4",".webm",".webp",".m4p",".m4v"];
    function ValidateSingleInput(oInput) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
            else{
                alert('Must select a file to upload');
            }
        }
        return true;
    }
    function cancelAddContentToGallery(){
        $('#media_source_file_input').val('');
        $('#gallery_add_content_short_title').val('');
        $('#media_source_yt_input').val('');
        $('#thumbnail_file_input').val('');
        $('#add-content-to-gallery').toggleClass('d-none');
    }
    function deleteGalleryContent(id){
        $.ajax({
            method: "POST",
            url: "./",
            success: function (data) {
                window.location.reload();
            },
            data: {
                id:id,
                action: 'delete_gallery_content'
            }
        });
    }


    function onWebsiteLeftBackgroundChange(isImage) {
        if (isImage === 'true'){
            $('#background-image-left-presentation').show();
            $('#video-animation-left-presentation').hide();
        }
        else{
            $('#background-image-left-presentation').hide();
            $('#video-animation-left-presentation').show();
        }
    }
</script>
</body>
</html>


