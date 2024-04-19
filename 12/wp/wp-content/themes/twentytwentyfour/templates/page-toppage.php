<?php
/*
Template Name: page-toppage
*/

/*************************
member
*************************/
// $member_sql  = 'SELECT * FROM '. $wpdb -> prefix .'posts AS p, '. $wpdb -> prefix .'postmeta AS pm ';
$member_sql  = 'SELECT * FROM '. $wpdb -> prefix .'posts AS p ';


$member_sql .= ' INNER JOIN '. $wpdb -> term_relationships .' AS tr ON ( p.ID = tr.object_id )';
$member_sql .= ' INNER JOIN '. $wpdb -> term_taxonomy .' AS tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)';
$member_sql .= ' INNER JOIN '. $wpdb -> terms .' AS t ON (t.term_id = tt.term_id)';
$member_sql .= ' INNER JOIN '. $wpdb -> postmeta .' AS pm1 ON (pm1.post_id = p.ID)';
$member_sql .= ' INNER JOIN '. $wpdb -> postmeta .' AS pm2 ON (pm2.post_id = p.ID)';
$member_sql .= ' INNER JOIN '. $wpdb -> postmeta .' AS pm3 ON (pm3.post_id = p.ID)';


$member_sql .= ' WHERE post_type = \'member\' AND post_status = \'publish\'';


if(!empty($_REQUEST['address'])):
    $address_list = $_REQUEST['address'];
    $address = implode('","', $address_list);
    $member_sql .= ' AND tt.taxonomy = \'member_address\' AND t.slug IN ("'. $address .'")';
endif;


if(!empty($_REQUEST['zipcode'])):
    $zipcode = $_REQUEST['zipcode'];
    $member_sql .= ' AND pm1.meta_key = \'zipcode\' AND pm1.meta_value = \''. $zipcode .'\'';
endif;


if(!empty($_REQUEST['line'])):
    $line = $_REQUEST['line'];
    $member_sql .= ' AND pm2.meta_key = \'line\' AND pm2.meta_value = \''. $line .'\'';
endif;


if(!empty($_REQUEST['adr'])):
    $adr = $_REQUEST['adr'];
    $member_sql .= ' AND pm3.meta_key = \'adr\' AND pm3.meta_value = \''. $adr .'\'';
endif;

$member_sql  .= ' group by ID';

// var_dump($member_sql);


/***************************
nom_rows用に実行 
***************************/
$wpdb -> get_results($member_sql);
$member_total  = $wpdb -> num_rows;
// var_dump($member_total);


/***************************
表示処理
***************************/
// var_dump($member_sql);

$member_page   = !empty($_REQUEST['member_page']) ? $_REQUEST['member_page'] : 0;
$member_offset = $member_page * 10;

$member_sql2   = 'SELECT * FROM '. $wpdb -> prefix .'posts AS p';


$member_sql2 .= ' INNER JOIN '. $wpdb -> term_relationships .' AS tr ON ( p.ID = tr.object_id )';
$member_sql2 .= ' INNER JOIN '. $wpdb -> term_taxonomy .' AS tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)';
$member_sql2 .= ' INNER JOIN '. $wpdb -> terms .' AS t ON (t.term_id = tt.term_id)';
$member_sql2 .= ' INNER JOIN '. $wpdb -> postmeta .' AS pm1 ON (pm1.post_id = p.ID)';
$member_sql2 .= ' INNER JOIN '. $wpdb -> postmeta .' AS pm2 ON (pm2.post_id = p.ID)';
$member_sql2 .= ' INNER JOIN '. $wpdb -> postmeta .' AS pm3 ON (pm3.post_id = p.ID)';

$member_sql2 .= ' WHERE post_type = \'member\' AND post_status = \'publish\'';

if(!empty($_REQUEST['address'])):
    $address_list = $_REQUEST['address'];
    $address = implode('","', $address_list);
    // $member_sql2 .= ' AND tt.taxonomy = \'member_address\' AND t.slug = \''. $address .'\'';
    $member_sql2 .= ' AND tt.taxonomy = \'member_address\' AND t.slug IN ("'. $address .'")';
endif;


if(!empty($_REQUEST['zipcode'])):
    $zipcode = $_REQUEST['zipcode'];
    $member_sql2 .= ' AND pm1.meta_key = \'zipcode\' AND pm1.meta_value = \''. $zipcode .'\'';
endif;


if(!empty($_REQUEST['line'])):
    $line = $_REQUEST['line'];
    $member_sql2 .= ' AND pm2.meta_key = \'line\' AND pm2.meta_value = \''. $line .'\'';
endif;


if(!empty($_REQUEST['adr']) && $_REQUEST['adr'] == 'yes'):
    $adr = $_REQUEST['adr'];
    $member_sql2 .= ' AND pm3.meta_key = \'adr\' AND pm3.meta_value = \''. $adr .'\'';
endif;


$member_sql2  .= ' group by ID';
$member_sql2  .= ' order by menu_order ASC';
// $member_sql2  .= ' limit '. 2;


if(!empty($member_page)):
    $member_sql2 .= ' offset '. $member_offset;
endif;

// print '<br>';
// print '<br>';
// print '<br>';
var_dump($member_sql2);

$data01 = $wpdb -> get_results($member_sql2);
// var_dump($data01);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    h2{
        margin-bottom: 0;
    }
    table{
        width: 100%;
    }
    th,td{
        padding: 10px;

    }
    td{
        border-bottom: 1px solid #ccc;
        border-right: 1px solid #ccc;
    }
    td:first-child{
        border-left: 1px solid #ccc;
    }
    th{
        background: #0e7;
    }
</style>
</head>
<body>
    <form action="./" method="POST">
        <h2>指定の地域があれば、お選びください。（複数選択できます）</h2>
        <?php
$terms = get_terms('member_address');
foreach($terms as $term):
//   echo $term->name;  //ターム名
//   echo $term->slug;  //スラッグ ?>
    <label><input type="checkbox" name="address[]" value="<?php echo $term -> slug;?>"><?php echo $term -> name;?></label>
    <?php
//   echo $term->count; //件数
// 
//   taxonomy.phpへのURL
//   echo get_term_link($term);
//   echo get_term_link($term->slug, 'member_address');
endforeach;
?>

        <h2>郵便番号で検索</h2>
        〒<input type="text" name="zipcode">

        <h2>指定の調査士がございましたら、頭文字でお選びください</h2>
        <label><input type="radio" name="line" value="ア行">ア行</label>
        <label><input type="radio" name="line" value="カ行">カ行</label>
        <label><input type="radio" name="line" value="サ行">サ行</label>
        <label><input type="radio" name="line" value="タ行">タ行</label>
        <label><input type="radio" name="line" value="ナ行">ナ行</label>
        <label><input type="radio" name="line" value="ハ行">ハ行</label>
        <label><input type="radio" name="line" value="マ行">マ行</label>
        <label><input type="radio" name="line" value="ヤ行">ヤ行</label>
        <label><input type="radio" name="line" value="ラ行">ラ行</label>
        <label><input type="radio" name="line" value="ワ行">ワ行</label>

        <h2>ADR認定土地家屋調査士の調査士を探す</h2>
        <label><input type="radio" name="adr" value="yes">はい</label>
        <label><input type="radio" name="adr" value="no" checked>いいえ</label>
        <br>
        <br>
        <input type="submit" value="Search"><br>
    </form>
    <?php
// var_dump($data01);
$members = $data01;
if(!empty($members) && 0 < count($members)):
// echo count($members) . '<br><br><br>'; ?>
<table>
    <tr>
        <th>名前</th>
        <th>事務所所在地</th>
        <th>ADR</th>
    </tr>
<?php
foreach($data01 as $post):
    setup_postdata($post);
    $date      = get_the_date("Y.m.d", $id);
    $view_date = get_the_date('Y年n月j日', $id);
    $title     = 30 < mb_strlen(get_the_title($id)) ? mb_substr(get_the_title($id), 0, 30) . "..." : get_the_title($id);
    $permalink = get_permalink($id);
    $address   = get_field('address', $id);
    $country   = get_the_terms($id, 'member_address');
    $adr       = get_field('adr', $id);
?>
    <tr>
        <td><?php echo $title; ?></td>
        <td><?php echo $address; ?></td>
        <td><?php if($adr == 'yes'): ?>ADR<?php endif; ?></td>
    </tr>
<?php
    // var_dump($title);
    // var_dump($address);
    // var_dump($adr);
endforeach;
?>
</table>
<?php
else: ?>
該当の情報が見つかりませんでした。
<?php
endif; ?>
</body>
</html>