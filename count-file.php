<!-- Menghitung Jumlah File yang Ada Di Suatu Directory/File -->
<?php
//Jalankan Fungsi Count File
function Count_File($NameDir) {
    if(is_dir($NameDir))
        $dirHandle = opendir($NameDir);
    if(!$dirHandle)
        return false;

    while($file = readdir($dirHandle)) {
        if($file != "." and $file != "..") {
            if(!is_dir($NameDir . "/" . $file)) {
                $dir = end(explode('/',$NameDir));
                $data[$dir][] = $file;
            }
            else {
                Count_File($NameDir . "/" . $file);
            }
        }
    }
    closedir($dirHandle);
    foreach($data as $key => $val) {
      //Menampilkan Jumlah File
        print(count($val));
    }
}
Count_File('Folder'); // 'Folder' adalah Nama Directory yang Akan Di Hitung Jumlah File nya
?>
