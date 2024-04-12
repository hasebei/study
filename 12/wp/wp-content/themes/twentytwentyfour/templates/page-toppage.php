<?php
/*
Template Name: page-toppage
*/

/*************************
 member
 *************************/
$member_sql  = 'SELECT * FROM '. $wpdb -> prefix .'posts AS p';


$address_category_slug = '';
if(!empty($_REQUEST['address'])):
    $address_category_slug = $_REQUEST['address'];
endif;

if(!empty($_REQUEST['zipcode'])):
    $zipcode = $_REQUEST['zipcode'];
endif;
 

if(!empty($address_category_slug)):
    $member_sql .= ' INNER JOIN '. $wpdb -> term_relationships .' AS tr ON ( p.ID = tr.object_id )';
    $member_sql .= ' INNER JOIN '. $wpdb -> term_taxonomy .' AS tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)';
    $member_sql .= ' INNER JOIN '. $wpdb -> terms .' AS t ON (t.term_id = tt.term_id)';
endif;

$member_sql .= ' WHERE post_type = \'member\' AND post_status = \'publish\'';


if(!empty($zipcode)):
    $member_sql .= ' AND '. $wpdb -> prefix . 'postmeta.meta_value = \''. $zipcode .'\'';
endif;

var_dump($member_sql);

if(!empty($address_category_slug)):
    $member_sql .= ' AND tt.taxonomy = \'member_address\' AND t.slug = \''. $address_category_slug .'\'';
endif;


$member_sql  .= ' group by ID';


/***************************
nom_rows用に実行 
***************************/
$wpdb -> get_results($member_sql);
$member_total  = $wpdb -> num_rows;


/***************************
表示処理
***************************/
// var_dump($member_sql);
var_dump($member_total);

$member_page   = !empty($_REQUEST['member_page']) ? $_REQUEST['member_page'] : 0;
$member_offset = $member_page * 10;

$member_sql2   = 'SELECT * FROM '. $wpdb -> prefix .'posts AS p';
if(!empty($address_category_slug)):
    $member_sql2  .= ' INNER JOIN '. $wpdb -> term_relationships .' AS tr ON ( p.ID = tr.object_id )';
    $member_sql2  .= ' INNER JOIN '. $wpdb -> term_taxonomy .' AS tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)';
    $member_sql2  .= ' INNER JOIN '. $wpdb -> terms .' AS t ON (t.term_id = tt.term_id)';
endif;

$member_sql2  .= ' WHERE post_type = \'member\' AND post_status = \'publish\'';

if(!empty($address_category_slug)):
    $member_sql2 .= ' AND tt.taxonomy = \'member_address\' AND t.slug = \''. $address_category_slug .'\'';
endif;

if(!empty($zipcode)):
    $member_sql2 .= ' AND '. $wpdb -> prefix . 'postmeta.meta_value = \''. $zipcode .'\'';
endif;

$member_sql2  .= ' group by ID';
$member_sql2  .= ' order by menu_order ASC';
$member_sql2  .= ' limit '. 10;

if(!empty($member_page)):
    $member_sql2 .= ' offset '. $member_offset;
endif;


$data01 = $wpdb -> get_results($member_sql2);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./" method="POST">
<?php
$terms = get_terms('member_address');
foreach($terms as $term):
//   echo $term->name;  //ターム名
//   echo $term->slug;  //スラッグ ?>
    <label><input type="radio" name="address" value="<?php echo $term -> slug;?>"><?php echo $term -> name;?></label>
<?php
//   echo $term->count; //件数
// 
//   taxonomy.phpへのURL
//   echo get_term_link($term);
//   echo get_term_link($term->slug, 'member_address');
endforeach;
?><br>
        〒<input type="text" name="zipcode">
        <input type="submit" value="Search">
    </form>
<?php
var_dump($data01);
$members = $data01;
foreach($members as $key => $val):
    var_dump($val -> post_title);
endforeach;
?>
</body>
</html>