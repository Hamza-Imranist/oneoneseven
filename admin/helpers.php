<?php


const SECTION_IMAGES = 0;
const SECTION_VIDEOS = 1;
const SECTION_PROJECTS = 2;

const CONTENT_TYPE_IMAGE = 0;
const CONTENT_TYPE_VIDEO = 1;
const CONTENT_TYPE_VIDEO_YOUTUBE = 2;

const JSON_DATASET = __DIR__ . '/data.json';

const JSON_DATASET_DEFAULT = [
    "portfolio_holder_name" => "John Doe",
    "portfolio_holder_profession" => "",
    'cta_email' => "",
    "portfolio_bio" => "",
    "gallery" => [],
    "connections" => [],
    "pricing" =>[],
    "skills"=>[]
];


function verifyAuthentication($admin_username, $admin_password)
{
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Invalid credentials';
        exit;
    } else {
        if (
            $admin_username !== $_SERVER['PHP_AUTH_USER'] ||
            $admin_password !== $_SERVER['PHP_AUTH_PW']
        ) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
        }
    }
}


function getDataset()
{

    if (file_exists(JSON_DATASET)) {
        $raw_json = file_get_contents(JSON_DATASET);
        $json = json_decode($raw_json, true);

        //check if dataset is corrupted
        if (json_last_error()) {

            // something must be wrong. back up the old dataset and create a fresh one
            copy(JSON_DATASET, str_replace('data.json', 'data_backup.json', JSON_DATASET));
            file_put_contents(JSON_DATASET, json_encode(JSON_DATASET_DEFAULT));
            return JSON_DATASET_DEFAULT;
        }
        return $json;
    } else {
        file_put_contents(JSON_DATASET, json_encode(JSON_DATASET_DEFAULT));
        return JSON_DATASET_DEFAULT;
    }
}

function saveDataset($d)
{
    file_put_contents(JSON_DATASET, json_encode($d));
}

function parsePost($p, &$d)
{
    if (isset($p['action'])) {
        $ext = function ($long) {
            $parts = explode(".", $long);
            return "." . array_pop($parts);
        };


        switch ($p['action']) {
            case 'save_portfolio':
                $d['portfolio_holder_name'] = $p['portfolio_holder_name'];
                $d['portfolio_holder_profession'] = $p['portfolio_holder_profession'];
                $d['portfolio_bio'] = trim(str_replace('Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a>', '', $p['portfolio_bio']));
                break;
            case 'add_skill':
                $d['skills'][md5(time() + rand(1, time()))] = [
                    "name" => $p['name'],
                    "value" => $p['value']
                ];

                saveDataset($d);
                die('ok');
                break;

            case 'remove_skill':
                unset($d['skills'][$p['value']]);
                saveDataset($d);
                die('ok');
                break;
            case 'change_profile_pic':
                $id = $d['profile_pic'] = md5(time() . rand(0, time()));

                $extension_profilepic = $d['profile_pic_extension'] = $ext($_FILES['profile_pic']['name']);
                move_uploaded_file($_FILES['profile_pic']['tmp_name'], __DIR__ . '/' . $id . $extension_profilepic);
                saveDataset($d);
                die('ok');
                break;
            case 'move_up_connection':
                $id = trim($p['id']);

                $all_keys = array_keys($d['connections']);
                if ($all_keys < 2){
                    die('ok');
                }
                $connections_length = count(array_keys($d['connections']));
                $index_of_element = array_search($id, $all_keys);


                $first_part = array_slice($d['connections'], 0, $index_of_element + 1, true);
                $second_part = array_slice($d['connections'], $index_of_element + 1, $connections_length - $index_of_element+1, true);


                //die(var_export($first_part));
                // element to be re-added first
                $first_part_keys = array_keys($first_part);
                $cnt = count($first_part_keys);
                $last_key = $first_part_keys[$cnt-1];
                $el1 =  [
                    $last_key => $first_part[$last_key]
                ];

                unset($first_part[$last_key]);



                //element to be re-added afterwards
                $el2 = false;
                if (isset($first_part_keys[$cnt-2])){

                    $last_2_key = $first_part_keys[$cnt-2];
                    $el2 =  [
                        $last_2_key => $first_part[$last_2_key]
                    ];

                    unset($first_part[$last_2_key]);
                }
                $first_part = array_merge($first_part, $el1);
                if ($el2)
                    $first_part = array_merge($first_part,$el2);





                $merged = array_merge($first_part,$second_part);



                $d['connections'] = $merged;



                saveDataset($d);
                die('ok');
                break;
            case 'move_up_pricing':
                $id = trim($p['id']);

                $all_keys = array_keys($d['pricing']);
                if ($all_keys < 2){
                    die('ok');
                }
                $connections_length = count(array_keys($d['pricing']));
                $index_of_element = array_search($id, $all_keys);


                $first_part = array_slice($d['pricing'], 0, $index_of_element + 1, true);
                $second_part = array_slice($d['pricing'], $index_of_element + 1, $connections_length - $index_of_element+1, true);


                //die(var_export($first_part));
                // element to be re-added first
                $first_part_keys = array_keys($first_part);
                $cnt = count($first_part_keys);
                $last_key = $first_part_keys[$cnt-1];
                $el1 =  [
                    $last_key => $first_part[$last_key]
                ];

                unset($first_part[$last_key]);



                //element to be re-added afterwards
                $el2 = false;
                if (isset($first_part_keys[$cnt-2])){

                    $last_2_key = $first_part_keys[$cnt-2];
                    $el2 =  [
                        $last_2_key => $first_part[$last_2_key]
                    ];

                    unset($first_part[$last_2_key]);
                }
                $first_part = array_merge($first_part, $el1);
                if ($el2)
                    $first_part = array_merge($first_part,$el2);





                $merged = array_merge($first_part,$second_part);



                $d['pricing'] = $merged;



                saveDataset($d);
                die('ok');
                break;
            case 'move_up_gallery':
                $id = trim($p['id']);

                $all_keys = array_keys($d['gallery']);
                if ($all_keys < 2){
                    die('ok');
                }
                $connections_length = count(array_keys($d['gallery']));
                $index_of_element = array_search($id, $all_keys);


                $first_part = array_slice($d['gallery'], 0, $index_of_element + 1, true);
                $second_part = array_slice($d['gallery'], $index_of_element + 1, $connections_length - $index_of_element+1, true);


                //die(var_export($first_part));
                // element to be re-added first
                $first_part_keys = array_keys($first_part);
                $cnt = count($first_part_keys);
                $last_key = $first_part_keys[$cnt-1];
                $el1 =  [
                    $last_key => $first_part[$last_key]
                ];

                unset($first_part[$last_key]);



                //element to be re-added afterwards
                $el2 = false;
                if (isset($first_part_keys[$cnt-2])){

                    $last_2_key = $first_part_keys[$cnt-2];
                    $el2 =  [
                        $last_2_key => $first_part[$last_2_key]
                    ];

                    unset($first_part[$last_2_key]);
                }
                $first_part = array_merge($first_part, $el1);
                if ($el2)
                    $first_part = array_merge($first_part,$el2);





                $merged = array_merge($first_part,$second_part);



                $d['gallery'] = $merged;



                saveDataset($d);
                die('ok');
                break;
            case 'add_pricing':
                unset($p['action']);
                if (!isset($d['pricing']) || !is_array($d['pricing'])){
                    $d['pricing'] = [];
                }

                $d['pricing'][$id = md5(time() . rand(0, time()))] = $p;


                saveDataset($d);
                die('ok');
                break;
            case 'move_down_connection':
                $id = trim($p['id']);
                $all_keys = array_keys($d['connections']);

                $connections_length = count(array_keys($d['connections']));
                $index_of_element = array_search($id, $all_keys);

                if ($all_keys < 2 || $index_of_element === $connections_length - 1){
                    die('ok');
                }



                $first_part = array_slice($d['connections'], 0, $index_of_element+2, true);
                $second_part = array_slice($d['connections'], $index_of_element+2, $connections_length-$index_of_element+2, true);




                // element to be re-added first
                $first_part_keys = array_keys($first_part);
                $cnt = count($first_part_keys);
                $last_key = $first_part_keys[$cnt-1];

                $el1 =  [
                    $last_key => $first_part[$last_key]
                ];

                unset($first_part[$last_key]);



                //element to be re-added afterwards
                $last_2_key = $first_part_keys[$cnt-2];
                $el2 =  [
                    $last_2_key => $first_part[$last_2_key]
                ];

                unset($first_part[$last_2_key]);

                $first_part = array_merge($first_part, $el1);
                if ($el2)
                    $first_part = array_merge($first_part,$el2);

                $merged = array_merge($first_part,$second_part);



                $d['connections'] = $merged;


                saveDataset($d);
                die('ok');
                break;

            case 'move_down_pricing':
                $id = trim($p['id']);
                $all_keys = array_keys($d['pricing']);

                $connections_length = count(array_keys($d['pricing']));
                $index_of_element = array_search($id, $all_keys);

                if ($all_keys < 2 || $index_of_element === $connections_length - 1){
                    die('ok');
                }



                $first_part = array_slice($d['pricing'], 0, $index_of_element+2, true);
                $second_part = array_slice($d['pricing'], $index_of_element+2, $connections_length-$index_of_element+2, true);




                // element to be re-added first
                $first_part_keys = array_keys($first_part);
                $cnt = count($first_part_keys);
                $last_key = $first_part_keys[$cnt-1];

                $el1 =  [
                    $last_key => $first_part[$last_key]
                ];

                unset($first_part[$last_key]);



                //element to be re-added afterwards
                $last_2_key = $first_part_keys[$cnt-2];
                $el2 =  [
                    $last_2_key => $first_part[$last_2_key]
                ];

                unset($first_part[$last_2_key]);

                $first_part = array_merge($first_part, $el1);
                if ($el2)
                    $first_part = array_merge($first_part,$el2);

                $merged = array_merge($first_part,$second_part);



                $d['pricing'] = $merged;


                saveDataset($d);
                die('ok');
                break;

            case 'move_down_gallery':
                $id = trim($p['id']);
                $all_keys = array_keys($d['gallery']);

                $connections_length = count(array_keys($d['gallery']));
                $index_of_element = array_search($id, $all_keys);

                if ($all_keys < 2 || $index_of_element === $connections_length - 1){
                    die('ok');
                }



                $first_part = array_slice($d['gallery'], 0, $index_of_element+2, true);
                $second_part = array_slice($d['gallery'], $index_of_element+2, $connections_length-$index_of_element+2, true);




                // element to be re-added first
                $first_part_keys = array_keys($first_part);
                $cnt = count($first_part_keys);
                $last_key = $first_part_keys[$cnt-1];

                $el1 =  [
                    $last_key => $first_part[$last_key]
                ];

                unset($first_part[$last_key]);



                //element to be re-added afterwards
                $last_2_key = $first_part_keys[$cnt-2];
                $el2 =  [
                    $last_2_key => $first_part[$last_2_key]
                ];

                unset($first_part[$last_2_key]);

                $first_part = array_merge($first_part, $el1);
                if ($el2)
                    $first_part = array_merge($first_part,$el2);

                $merged = array_merge($first_part,$second_part);



                $d['gallery'] = $merged;


                saveDataset($d);
                die('ok');
                break;
            case 'add_connection':
                unset ($p['action']);

                // GENERATE ID MD5
                $id = md5(time() . rand(0, time()));


                // generate thumbnail
                $extension_pic = $ext($_FILES['pic']['name']);
                move_uploaded_file($_FILES['pic']['tmp_name'], __DIR__ . '/../img/references/' . $id . $extension_pic);


                $p['extension_pic'] = $extension_pic;
                // add to dataset

                $d['connections'][$id] = $p;

                saveDataset($d);
                die('ok');
                break;
            case 'add_gallery_content':
                unset ($p['action']);

                // GENERATE ID MD5
                $id = md5(time() . rand(0, time()));


                // generate thumbnail
                $extension_thumbnail = $ext($_FILES['thumbnail']['name']);
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], __DIR__ . '/../img/works/' . $id . $extension_thumbnail);

                // generate video if needed
                if ((int)$p['media_type'] === CONTENT_TYPE_VIDEO) {
                    $extension_video = $ext($_FILES['video']['name']);
                    $p['extension_video'] = $extension_video;
                    move_uploaded_file($_FILES['video']['tmp_name'], __DIR__ . '/../video/' . $id . $extension_video);

                }

                $p['extension_thumbnail'] = $extension_thumbnail;
                // add to dataset

                $d['gallery'][$id] = $p;
                saveDataset($d);
                die;
                break;
            case 'delete_customer_connection':
                unset($d['connections'][$p['id']]);
                saveDataset($d);
                die('ok');
                break;
            case 'delete_pricing':
                unset($d['pricing'][$p['id']]);
                saveDataset($d);
                die('ok');
                break;
            case 'delete_gallery_content':
                unset($d['gallery'][$p['id']]);
                saveDataset($d);
                die('ok');
                break;
            case 'save_website_settings':

                if (isset($_FILES['background_video']) && file_exists(@$_FILES['background_video']['tmp_name'])) {

                    $id = md5(time() . rand(0, time()));

                    // generate video
                    $video_extension = $ext($_FILES['background_video']['name']);
                    move_uploaded_file($_FILES['background_video']['tmp_name'], __DIR__ . '/../video/' . $id . $video_extension);

                    $d['background_video_extension'] = $video_extension;
                    $d['background_video'] = $id;

                }
                if (isset($_FILES['background_left_image']) && file_exists(@$_FILES['background_left_image']['tmp_name'])) {

                    $id = md5(time() . rand(0, time()));

                    // generate video
                    $video_extension = $ext($_FILES['background_left_image']['name']);
                    move_uploaded_file($_FILES['background_left_image']['tmp_name'], __DIR__ . '/../img/backgrounds/' . $id . $video_extension);

                    $d['background_left_image'] = $id;
                    $d['background_left_image_extension'] = $video_extension;

                }
                if (isset($_FILES['background_right_image']) && file_exists(@$_FILES['background_right_image']['tmp_name'])) {

                    $id = md5(time() . rand(0, time()));

                    // generate video
                    $video_extension = $ext($_FILES['background_right_image']['name']);
                    move_uploaded_file($_FILES['background_right_image']['tmp_name'], __DIR__ . '/../img/backgrounds/' . $id . $video_extension);

                    $d['background_right_image'] = $id;
                    $d['background_right_image_extension'] = $video_extension;

                }


                $d['background_left_is_image'] = $p['background_left_is_image'];
                $d['cta_email'] = @$p['cta_email'];
                $d['contact_facebook'] = @$p['contact_facebook'];
                $d['contact_whatsapp'] = @$p['contact_whatsapp'];
                $d['contact_telegram'] = @$p['contact_telegram'];
                break;
        }


    }


    saveDataset($d);

}