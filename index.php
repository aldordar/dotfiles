<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>localhost</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/x-icon" href="https://image.flaticon.com/icons/svg/149/149205.svg" />
  <style>
    ul {
      padding: 0;
      list-style-type: none;
    }
    li {
      background-color: rgba(0, 0, 0, 0.05);
      display: flex;
      width: 50%;
      padding: 5px;
      border: 2px solid rgba(0, 0, 0, 0.1);
      transition: all .2s;
    }
    li:hover {
      border: 2px solid rgba(0, 0, 0, 0.2);
    }
    .dir, .file {
      margin: 0 6px 0 0;
      width: 5%;
    }
    .dir {
      background: url('https://image.flaticon.com/icons/svg/148/148947.svg');
      background-size: 100%;
      background-repeat: no-repeat;
      background-position: center;
    }
    .file {
      background: url('https://image.flaticon.com/icons/svg/149/149345.svg');
      background-size: 100%;
      background-repeat: no-repeat;
      background-position: center;
    }
    .link-to-file {
      width: 60%;
    }
    span {
      position: relative;
      right: -5px;
      width: 30%;
      text-align: end;
    }
    a {
      color: inherit;
      text-decoration: inherit; 
    }
    a:hover {
      color: inherit;
    }
    .database {
      display: flex;
      margin-top: 2rem;
      font-size: 1.2rem;
    }
    .db-icon{
      margin-right: 3px;
      width: 2rem;
      height: 2rem;
      background: url('https://image.flaticon.com/icons/svg/148/148825.svg');
      background-size: 100%;
      background-repeat: no-repeat;
      background-position: center;
    }
  </style>
</head>
<body>
<div class="container mt-5">
 <h3 class="mb-3">localhost - LAMP Server</h3> 
 <?php
    $dir = '.';
    $files = array_diff( scandir($dir), array('.', '..', 'index.php') );

    function folderSize($dir){
      $count_size = 0;
      $count = 0;
      $dir_array = scandir($dir);
        foreach($dir_array as $key=>$filename){
          if($filename!=".." && $filename!="."){
             if(is_dir($dir."/".$filename)){
                $new_foldersize = foldersize($dir."/".$filename);
                $count_size = $count_size+ $new_foldersize;
              }else if(is_file($dir."/".$filename)){
                $count_size = $count_size + filesize($dir."/".$filename);
                $count++;
              }
         }
       }
      return $count_size;
      }

      function my_filesize($bytes, $decimals = 2){
        $size = array(' B',' KB',' MB',' GB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
      }

      function sizeFormat($bytes){ 
        $kb = 1024;
        $mb = $kb * 1024;
        $gb = $mb * 1024;
        $tb = $gb * 1024;

        if (($bytes >= 0) && ($bytes < $kb)) {
        return $bytes . ' B';
        
        } elseif (($bytes >= $kb) && ($bytes < $mb)) {
        return round($bytes / $kb, 2) . ' KB';
        
        } elseif (($bytes >= $mb) && ($bytes < $gb)) {
        return round($bytes / $mb, 2) . ' MB';
        
        } elseif (($bytes >= $gb) && ($bytes < $tb)) {
        return round($bytes / $gb, 2) . ' GB';
        
        } elseif ($bytes >= $tb) {
        return round($bytes / $tb, 2) . ' TB';
        } else {
        return $bytes . ' B';
        }
        }
    ?>
    <ul class="list-projects">
    <?php
    foreach($files as $file){
      (filetype($file) == 'dir') ? $icon = 'dir' : $icon = 'file';
      (filetype($file) == 'dir') ? $id = '/' : $id = '';
      (filetype($file) == 'dir') ? $filesize = sizeFormat(folderSize($file)) : $filesize = my_filesize(filesize($file));

      echo '<li class="mb-1"><div class="'.$icon.'"></div><a class="link-to-file" href="'.$file.'">'.$file.$id.'</a><span>'.$filesize.'</span></li>';
    }
    ?>
    </ul>
    <div class="database">
      <div class="db-icon"></div>
      <a href="phpmyadmin">phpMyAdmin</a>
    </div>
</div>
</body>
</html>
