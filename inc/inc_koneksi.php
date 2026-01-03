<php?
$host       ="localhost";
$user       ="root";
$pass       ="";
$db         ="smapertiwi";

$koneksi       = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("gagal tekoneksi");
}else{
    echo "koneksi berhasil"
}
