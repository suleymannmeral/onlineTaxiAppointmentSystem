<?php

function safety($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;


}


function getDriversByPoint()
{
     include "database/db.php";
     $query = "SELECT * FROM soforler ORDER BY puan DESC LIMIT 3";

     $sonuc=mysqli_query($baglanti,$query);
     mysqli_close($baglanti);
     return $sonuc;

}
function changeDate(int $id,string $baslangic,string $bitis)
{
     include "database/db.php";
    $query="UPDATE randevuzamanlama set baslangicTarihi='$baslangic',bitisTarihi='$bitis' where id=$id";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}


// function.php dosyası
function getDateFromDatabase()
{
     include "database/db.php";
     $query = "SELECT * FROM randevuzamanlama";
     $sonuc = mysqli_query($baglanti, $query);
     mysqli_close($baglanti);
     return $sonuc;
}
function getDatesById(int $id)
{
    
    include "database/db.php";
    $query="SELECT * from randevuzamanlama WHERE id='$id'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}

function getMeetings()
{
     include "database/db.php";
     $query="SELECT * from randevular where onay='Onay Bekliyor'";
     $sonuc=mysqli_query($baglanti,$query);
     mysqli_close($baglanti);
     return $sonuc;

}
function getAllMeetingsSonlanan($limit, $offset) {
    include "database/db.php";
    $query = "SELECT * FROM randevular WHERE onay='Sonlandı' LIMIT $limit OFFSET $offset";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getTotalMeetingsSonlanan() {
    include "database/db.php";
    $query = "SELECT COUNT(*) as total FROM randevular WHERE onay='Sonlandı'";
    $result = mysqli_query($baglanti, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($baglanti);
    return $row['total'];
}
function getMeetingsOnayBekleyenByAd($limit, $offset,$ad) {
    include "database/db.php";
    $query = "SELECT * FROM randevular WHERE onay='Onay Bekliyor' and  kullaniciAdi='$ad' LIMIT $limit OFFSET $offset";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getTotalMeetingsOnayBekleyenByAd($ad) {
    include "database/db.php";
    $query = "SELECT COUNT(*) as total FROM randevular WHERE onay='Onay Bekliyor' and kullaniciAdi='$ad'";
    $result = mysqli_query($baglanti, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($baglanti);
    return $row['total'];
}

function getMeetingsOnayBekleyen($limit, $offset) {
    include "database/db.php";
    $query = "SELECT * FROM randevular WHERE onay='Onay Bekliyor' LIMIT $limit OFFSET $offset";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getTotalMeetingsOnayBekleyen() {
    include "database/db.php";
    $query = "SELECT COUNT(*) as total FROM randevular WHERE onay='Onay Bekliyor'";
    $result = mysqli_query($baglanti, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($baglanti);
    return $row['total'];
}


function getPuanlamaSorilari() {
    include "database/db.php";
    $query = "SELECT * from puanlamasorulari  ";
    $sonuc = mysqli_query($baglanti, $query);
   
    mysqli_close($baglanti);
    return $sonuc;
}






function deleteDrivers(int $id)
{
    include "database/db.php";
   $query="DELETE from soforler where id=$id";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getDriversById(int $id)
{
    
    include "database/db.php";
    $query="SELECT * from soforler WHERE id='$id'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}
function getMeetingsById(int $id)
{
    
    include "database/db.php";
    $query="SELECT * from randevular WHERE id='$id'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}
function getPointBySoforId(int $id)
{
    
    include "database/db.php";
    $query="SELECT * from soforler WHERE id='$id'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}

function getDepDateFromMeetings()
{
    include "database/db.php";
    $query="SELECT kalkisTarihi,kullaniciAdi from randevular where onay ='Onaylandı'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}


function updatePoint(int $puan, string  $soforAdi )
{
    include "database/db.php";
    $query="UPDATE  soforler set puan='$puan' where soforAdi='$soforAdi'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getMeetingsByAd(string $ad)
{
    
    include "database/db.php";
    $query="SELECT * from randevular WHERE kullaniciAdi='$ad' and onay='Onay Bekliyor'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}
function getMailAdressByUsername(string $usern)
{
    include "database/db.php";
    $query = "SELECT * FROM kullanici WHERE kullaniciUsername='$usern'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getUsernameByMeetingsID($id)
{
    include "database/db.php";
    $query = "SELECT kullaniciAdi FROM randevular WHERE id='$id'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}



function getOnayliMeetings()
{
    
    include "database/db.php";
    $query="SELECT * from randevular WHERE onay='Onaylandı'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}

function getDriversByAd(string $ad)
{
    
    include "database/db.php";
    $query="SELECT * from soforler WHERE soforAdi='$ad'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}
function getRandevuTarihi()
{
    
    include "database/db.php";
    $query="SELECT * from randevuzamanlama";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}


function getSoforIdBySoforAdi(string $ad)
{
    
    include "database/db.php";
    $query="SELECT id from  soforler where soforAdi='$ad' ";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}
function getDegerlendirme()
{
    
    include "database/db.php";
    $query="SELECT * from  degerlendirme";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}


function uploadImage(array $file)

{
    if(isset($file))
    {
        $dest_path="C:\laragon\www\onlineTaksi\images/";
        $fileName=$file["name"];
        $fileSourcePath=$file["tmp_name"];
        $fileDestPath=$dest_path.$fileName;

        move_uploaded_file($fileSourcePath,$fileDestPath);

        

        
    }
}

function createDrivers(string $soforAdi, string $resim,string $plaka, string $telefon, string $mail,string $aracozellik) 

{
    include "database/db.php";

    $query = "INSERT INTO soforler (soforAdi, soforResim, plaka, telefon, soforMail, aracOzellikleri) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($baglanti, $query);
    mysqli_stmt_bind_param($stmt, 'ssssss', $soforAdi, $resim, $plaka, $telefon, $mail, $aracozellik);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
   return $stmt;
    
    
    
    
}

function createMeetings(string $kullaniciAdi, string $adSoyad,string $kalkisAdresi, string $kalkisTarihi, string $varisAdres,string $sofor, string $telefon) 

{
    include "database/db.php";

    $query = "INSERT INTO randevular (kullaniciAdi, adSoyad, kalkisAdres, kalkisTarihi, varisAdres, sofor,telefon) VALUES (?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($baglanti, $query);
    mysqli_stmt_bind_param($stmt, 'sssssss', $kullaniciAdi, $adSoyad, $kalkisAdresi, $kalkisTarihi, $varisAdres, $sofor,$telefon);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
   return $stmt;
    
    
    
    
}
function updateMeetings(string $kullaniciAdi, string $adSoyad,string $kalkisAdresi, string $kalkisTarihi, string $varisAdres,string $sofor, string $telefon) 

{
    include "database/db.php";

    $query = "UPDATE randevular set kullaniciAdi='$kullaniciAdi', adSoyad='$adSoyad',kalkisAdres='$kalkisAdresi', kalkisTarihi='$kalkisAdresi', varisAdres='$varisAdres' sofor='$sofor',telefon='$telefon'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

    
    
    
    


function createDegerlendirme(int $id , int $soru1,int $soru2, int  $soru3, int $soru4,int  $soru5, int  $soru6) 

{
    include "database/db.php";

    $query = "INSERT INTO degerlendirme (randevuID, soru1, soru2, soru3, soru4,soru5,soru6) VALUES (?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($baglanti, $query);
    mysqli_stmt_bind_param($stmt, 'iiiiiii', $id ,  $soru1, $soru2,   $soru3,  $soru4,  $soru5,   $soru6);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
   return $stmt;
    
    
    
    
}


function updateDrivers(int $id,string $soforAdi,string $soforResim,string $plaka, string $telefon,string $mail,string $aracozellik)
{
     include "database/db.php";
    $query="UPDATE soforler set soforAdi='$soforAdi',soforResim='$soforResim',plaka='$plaka',telefon='$telefon',soforMail='$mail',aracOzellikleri='$aracozellik'  where id=$id";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}

function updateOnay(int $id)
{
     include "database/db.php";
    $query="UPDATE randevular set onay='Onaylandı' where id=$id";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}
function cancelMeeting(int $id)
{
     include "database/db.php";
    $query="DELETE FROM  randevular where id=$id";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}




function updateSonlandir(int $id)
{
     include "database/db.php";
    $query="UPDATE randevular set onay='Sonlandı' where id=$id";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}

function updateSorular( int $id,string $soru1, string $soru2, string $soru3, string $soru4, string $soru5, string $soru6)
{
    include "database/db.php";
    $query="UPDATE  puanlamasorulari set s1text='$soru1',s2text='$soru2',s3text='$soru3',s4text='$soru4',s5text='$soru5',s6text='$soru6'  where id='$id'";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getMeetingsOnayli($limit, $offset) {
    include "database/db.php";
    $query = "SELECT * FROM randevular WHERE onay='Onaylandı' LIMIT $limit OFFSET $offset";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getTotalMeetingsOnayli() {
    include "database/db.php";
    $query = "SELECT COUNT(*) as total FROM randevular WHERE onay='Onaylandı'";
    $result = mysqli_query($baglanti, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($baglanti);
    return $row['total'];
}



function getMeetingsByAdOnayliSonlandi($limit,$offset,string $ad)
{
    
    include "database/db.php";
    $query="SELECT * from randevular WHERE kullaniciAdi='$ad' and onay='Sonlandı' LIMIT $limit OFFSET $offset";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}
function getTotalMeetingKullaniciSonlandi(string $ad) {
    include "database/db.php";
    $query = "SELECT COUNT(*) as total FROM randevular WHERE onay='Onaylandı' and kullaniciAdi='$ad' ";
    $result = mysqli_query($baglanti, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($baglanti);
    return $row['total'];
}

function getMeetingsByAdOnayli($limit,$offset,string $ad)
{
    
    include "database/db.php";
    $query="SELECT * from randevular WHERE kullaniciAdi='$ad' and onay='Onaylandı' LIMIT $limit OFFSET $offset";
    $sonuc=mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;

}
function getTotalMeetingKullaniciOnaylandi(string $ad) {
    include "database/db.php";
    $query = "SELECT COUNT(*) as total FROM randevular WHERE onay='Onaylandı' and kullaniciAdi='$ad' ";
    $result = mysqli_query($baglanti, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($baglanti);
    return $row['total'];
}
function getDriversG() {
    include "database/db.php";
    $query = "SELECT * FROM soforler";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}


function getDrivers(int $limit, int  $offset) {
    include "database/db.php";
    $query = "SELECT * FROM soforler LIMIT $limit OFFSET $offset";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getTotalDrivers()
{
     include "database/db.php";
     $query="SELECT Count(*) as total  from soforler";
     $result = mysqli_query($baglanti, $query);
     $row = mysqli_fetch_assoc($result);
     mysqli_close($baglanti);
     return $row['total'];

}

function getKullaniciBilgileriByUsername($ad) {
    include "database/db.php";
    $query = "SELECT * FROM kullanici where kullaniciUsername='$ad'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getsoforBySoforAdi(string $usern)
{
    include "database/db.php";
    $query = "SELECT * FROM  sofor WHERE kullaniciUsername='$usern'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getUsersByUsername(string $usernamee)
{
    include "database/db.php";
    $query = "SELECT * FROM  kullanici WHERE kullaniciUsername='$usernamee'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

?>