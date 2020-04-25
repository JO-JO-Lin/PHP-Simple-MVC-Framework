<?php
include dirname(__FILE__)."/db.php";
$pdo = connect_db();

function pdo($sql, $item){
  global $pdo;
  $stm = $pdo -> prepare($sql);
  $stm -> execute($item);
  return $stm;
}

function pdo_selectAll($sql,$item){
  $stm = pdo($sql, $item);
  $result = $stm -> fetchAll();
  return $result;
}

function pdo_select($sql,$item){
  $stm = pdo($sql, $item);
  $data = $stm -> fetch();
  return $data;
}

// 頁面轉跳方法
function redirect($url, $msg)
{
    echo "<script>window.alert('{$msg}');</script>";
    echo "<script type='text/javascript'>";
    echo "window.location.href='{$url}'";
    echo "</script>";
    exit;
}

// 欄位驗證
function checkInput($item)
{
    $item = trim($item);
    return $item;
}

// 登出頁面轉跳方法
function redirect_logout($url, $msg)
{
    echo "{$msg}";
    echo "<script type='text/javascript'>";
    echo "window.location.href='{$url}'";
    echo "</script>";
    exit;
}

// 刪除圖片
function delFile($path, $filename){
    $file_path = $path . $filename;
    if (is_dir($path)){
        if (chmod($file_path, 0755)){
            unlink($file_path);
        }
    }
}
?>
