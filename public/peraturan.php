<?php
include 'dom.php';
$connect = mysqli_connect('localhost','root','','bkd_backup');
$connect2 = mysqli_connect('localhost','root','','project_bkd');


$list =[
    ['nama'=>'UNDANG-UNDANG','url'=>"https://bkd.riau.go.id/peraturan/undang-undang/"],
    ['nama'=>'PERATURAN PEMERINTAH','url'=>"https://bkd.riau.go.id/peraturan/peraturan-pemerintah/"],
    ['nama'=>'PERATURAN PRESIDEN','url'=>"https://bkd.riau.go.id/peraturan/peraturan-presiden/"],
    ['nama'=>'KEPUTUSAN PRESIDEN','url'=>"https://bkd.riau.go.id/peraturan/keputusan-presiden/"],
    ['nama'=>'INSTRUKSI PRESIDEN','url'=>"https://bkd.riau.go.id/peraturan/instruksi-presiden/"],
    ['nama'=>'KEPUTUSAN MENTERI DALAM NEGERI','url'=>"https://bkd.riau.go.id/peraturan/keputusan-menteri-dalam-negeri/"],
    ['nama'=>'KEPUTUSAN MENTERI PAN-RB','url'=>"https://bkd.riau.go.id/peraturan/keputusan-menteri-pan-rb/"],
    ['nama'=>'PERATURAN KEPALA BKN','url'=>"https://bkd.riau.go.id/peraturan/peraturan-kepala-bkn/"],
    ['nama'=>'PERATURAN MENTERI DALAM NEGERI','url'=>"https://bkd.riau.go.id/peraturan/peraturan-menteri-dalam-negeri/"],
    ['nama'=>'PERATURAN MENTERI PAN-RB','url'=>"https://bkd.riau.go.id/peraturan/peraturan-menteri-pan-rb/"],
    ['nama'=>'PERATURAN DAERAH','url'=>"https://bkd.riau.go.id/peraturan/peraturan-daerah/"],
    ['nama'=>'PERATURAN GUBERNUR','url'=>"https://bkd.riau.go.id/peraturan/peraturan-gubernur/"],
    ['nama'=>'PERATURAN BKD','url'=>"https://bkd.riau.go.id/peraturan-bkd/"],
    ];
foreach ($list as $key) 
{
    $slug = bersih($key['nama'],"-");
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    $save = mysqli_query($connect2,"INSERT INTO `kategori_peraturans`(`nama`,`slug`, `created_at`, `updated_at`) VALUES ('".$key['nama']."','".$slug."','".$created_at."','".$updated_at."')");
    $id = mysqli_insert_id($connect2);
    getData($key['url'],$id);
    
}
function getData($url,$id)
{
    $connect2 = mysqli_connect('localhost','root','','project_bkd');
    $data = file_get_contents("https://bkd.riau.go.id/peraturan/undang-undang/");
    $dom = new simple_html_dom();
    $dom = $dom->load($data);
    $i = 1;
    $l = 0;
    $ar = array();
    $skip = 0;
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    foreach ($dom->find("table td") as $items) 
    {
        if($i == 5)
        {
            if($skip == 1)
            {
                $l++;
            }

            $skip = 1;
            $i = 1;
        }

        if($skip == 1)
        {
            if($i == 1)
           {
            $ar[$l]['nomor'] = trim(strip_tags($items));
           }
           if($i == 2)
           {
            $ar[$l]['tentang'] = str_replace(["&nbsp;","Nbsp"], "",ucwords(bersih(trim(strip_tags($items))," ")));
           }
           if($i == 3)
           {
            $ar[$l]['tahun'] = str_replace(["&nbsp;","Nbsp"], "",ucwords(bersih(trim(strip_tags($items))," ")));
           }
           if($i == 4)
           {
            $ar[$l]['file'] =  $items->find('a',0)->href;
           }
        }
       
       $i++;
    }
    foreach($ar as $a)
    {
        $judul = $a['tentang'];
        $slug = str_replace(' ','-',bersih($judul));
        $filename = $slug.'.pdf';
        savePDF($filename,$a['file']);
        $save = mysqli_query($connect2,"INSERT INTO `peraturans`(`kategori_peraturan_id`,`nomor`,`tentang`,`tahun`,`file`,`slug`,`created_at`, `updated_at`) VALUES ('".$id."','".$a['nomor']."','".$judul."','".$a['tahun']."','".$filename."','".$slug."','".$created_at."','".$updated_at."')");

        
    }
}



function savePDF($judul,$url)
{
	$data = file_get_contents($url);
	$dom = new simple_html_dom();
	$dom = $dom->load($data);   
	foreach($dom->find('#downloadFile') as $item)
	{
		if(isset($item->href))
		{
			$path = "uploads/peraturan/".$judul;
			file_put_contents($path, file_get_contents($item->href));
		}
		
	}
}

function bersih( $str, $delimiter = '-', $options = array() )
{

    $str = mb_convert_encoding( ( string ) $str, 'UTF-8', mb_list_encodings() );

    $defaults = array(
        'delimiter' => $delimiter,
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => false,
    );

    $options = array_merge( $defaults, $options );

    $char_map = array(
        // Latin
        'ÃƒÂ€' => 'A', 'ÃƒÂ' => 'A', 'ÃƒÂ‚' => 'A', 'ÃƒÂƒ' => 'A', 'ÃƒÂ„' => 'A', 'ÃƒÂ…' => 'A', 'ÃƒÂ†' => 'AE', 'ÃƒÂ‡' => 'C',
        'ÃƒÂˆ' => 'E', 'ÃƒÂ‰' => 'E', 'ÃƒÂŠ' => 'E', 'ÃƒÂ‹' => 'E', 'ÃƒÂŒ' => 'I', 'ÃƒÂ' => 'I', 'ÃƒÂŽ' => 'I', 'ÃƒÂ' => 'I',
        'ÃƒÂ' => 'D', 'ÃƒÂ‘' => 'N', 'ÃƒÂ’' => 'O', 'ÃƒÂ“' => 'O', 'ÃƒÂ”' => 'O', 'ÃƒÂ•' => 'O', 'ÃƒÂ–' => 'O', 'Ã…Â' => 'O',
        'ÃƒÂ˜' => 'O', 'ÃƒÂ™' => 'U', 'ÃƒÂš' => 'U', 'ÃƒÂ›' => 'U', 'ÃƒÂœ' => 'U', 'Ã…Â°' => 'U', 'ÃƒÂ' => 'Y', 'ÃƒÂž' => 'TH',
        'ÃƒÂŸ' => 'ss',
        'Ãƒ ' => 'a', 'ÃƒÂ¡' => 'a', 'ÃƒÂ¢' => 'a', 'ÃƒÂ£' => 'a', 'ÃƒÂ¤' => 'a', 'ÃƒÂ¥' => 'a', 'ÃƒÂ¦' => 'ae', 'ÃƒÂ§' => 'c',
        'ÃƒÂ¨' => 'e', 'ÃƒÂ©' => 'e', 'ÃƒÂª' => 'e', 'ÃƒÂ«' => 'e', 'ÃƒÂ¬' => 'i', 'ÃƒÂ­' => 'i', 'ÃƒÂ®' => 'i', 'ÃƒÂ¯' => 'i',
        'ÃƒÂ°' => 'd', 'ÃƒÂ±' => 'n', 'ÃƒÂ²' => 'o', 'ÃƒÂ³' => 'o', 'ÃƒÂ´' => 'o', 'ÃƒÂµ' => 'o', 'ÃƒÂ¶' => 'o', 'Ã…Â‘' => 'o',
        'ÃƒÂ¸' => 'o', 'ÃƒÂ¹' => 'u', 'ÃƒÂº' => 'u', 'ÃƒÂ»' => 'u', 'ÃƒÂ¼' => 'u', 'Ã…Â±' => 'u', 'ÃƒÂ½' => 'y', 'ÃƒÂ¾' => 'th',
        'ÃƒÂ¿' => 'y',

        // Latin symbols
        'Ã‚Â©' => '(c)',

        // Greek
        'ÃŽÂ‘' => 'A', 'ÃŽÂ’' => 'B', 'ÃŽÂ“' => 'G', 'ÃŽÂ”' => 'D', 'ÃŽÂ•' => 'E', 'ÃŽÂ–' => 'Z', 'ÃŽÂ—' => 'H', 'ÃŽÂ˜' => '8',
        'ÃŽÂ™' => 'I', 'ÃŽÂš' => 'K', 'ÃŽÂ›' => 'L', 'ÃŽÂœ' => 'M', 'ÃŽÂ' => 'N', 'ÃŽÂž' => '3', 'ÃŽÂŸ' => 'O', 'ÃŽ ' => 'P',
        'ÃŽÂ¡' => 'R', 'ÃŽÂ£' => 'S', 'ÃŽÂ¤' => 'T', 'ÃŽÂ¥' => 'Y', 'ÃŽÂ¦' => 'F', 'ÃŽÂ§' => 'X', 'ÃŽÂ¨' => 'PS', 'ÃŽÂ©' => 'W',
        'ÃŽÂ†' => 'A', 'ÃŽÂˆ' => 'E', 'ÃŽÂŠ' => 'I', 'ÃŽÂŒ' => 'O', 'ÃŽÂŽ' => 'Y', 'ÃŽÂ‰' => 'H', 'ÃŽÂ' => 'W', 'ÃŽÂª' => 'I',
        'ÃŽÂ«' => 'Y',
        'ÃŽÂ±' => 'a', 'ÃŽÂ²' => 'b', 'ÃŽÂ³' => 'g', 'ÃŽÂ´' => 'd', 'ÃŽÂµ' => 'e', 'ÃŽÂ¶' => 'z', 'ÃŽÂ·' => 'h', 'ÃŽÂ¸' => '8',
        'ÃŽÂ¹' => 'i', 'ÃŽÂº' => 'k', 'ÃŽÂ»' => 'l', 'ÃŽÂ¼' => 'm', 'ÃŽÂ½' => 'n', 'ÃŽÂ¾' => '3', 'ÃŽÂ¿' => 'o', 'ÃÂ€' => 'p',
        'ÃÂ' => 'r', 'ÃÂƒ' => 's', 'ÃÂ„' => 't', 'ÃÂ…' => 'y', 'ÃÂ†' => 'f', 'ÃÂ‡' => 'x', 'ÃÂˆ' => 'ps', 'ÃÂ‰' => 'w',
        'ÃŽÂ¬' => 'a', 'ÃŽÂ­' => 'e', 'ÃŽÂ¯' => 'i', 'ÃÂŒ' => 'o', 'ÃÂ' => 'y', 'ÃŽÂ®' => 'h', 'ÃÂŽ' => 'w', 'ÃÂ‚' => 's',
        'ÃÂŠ' => 'i', 'ÃŽÂ°' => 'y', 'ÃÂ‹' => 'y', 'ÃŽÂ' => 'i',

        // Turkish
        'Ã…Âž' => 'S', 'Ã„Â°' => 'I', 'ÃƒÂ‡' => 'C', 'ÃƒÂœ' => 'U', 'ÃƒÂ–' => 'O', 'Ã„Âž' => 'G',
        'Ã…ÂŸ' => 's', 'Ã„Â±' => 'i', 'ÃƒÂ§' => 'c', 'ÃƒÂ¼' => 'u', 'ÃƒÂ¶' => 'o', 'Ã„ÂŸ' => 'g',

        // Russian
        'ÃÂ' => 'A', 'ÃÂ‘' => 'B', 'ÃÂ’' => 'V', 'ÃÂ“' => 'G', 'ÃÂ”' => 'D', 'ÃÂ•' => 'E', 'ÃÂ' => 'Yo', 'ÃÂ–' => 'Zh',
        'ÃÂ—' => 'Z', 'ÃÂ˜' => 'I', 'ÃÂ™' => 'J', 'ÃÂš' => 'K', 'ÃÂ›' => 'L', 'ÃÂœ' => 'M', 'ÃÂ' => 'N', 'ÃÂž' => 'O',
        'ÃÂŸ' => 'P', 'Ã ' => 'R', 'ÃÂ¡' => 'S', 'ÃÂ¢' => 'T', 'ÃÂ£' => 'U', 'ÃÂ¤' => 'F', 'ÃÂ¥' => 'H', 'ÃÂ¦' => 'C',
        'ÃÂ§' => 'Ch', 'ÃÂ¨' => 'Sh', 'ÃÂ©' => 'Sh', 'ÃÂª' => '', 'ÃÂ«' => 'Y', 'ÃÂ¬' => '', 'ÃÂ­' => 'E', 'ÃÂ®' => 'Yu',
        'ÃÂ¯' => 'Ya',
        'ÃÂ°' => 'a', 'ÃÂ±' => 'b', 'ÃÂ²' => 'v', 'ÃÂ³' => 'g', 'ÃÂ´' => 'd', 'ÃÂµ' => 'e', 'Ã‘Â‘' => 'yo', 'ÃÂ¶' => 'zh',
        'ÃÂ·' => 'z', 'ÃÂ¸' => 'i', 'ÃÂ¹' => 'j', 'ÃÂº' => 'k', 'ÃÂ»' => 'l', 'ÃÂ¼' => 'm', 'ÃÂ½' => 'n', 'ÃÂ¾' => 'o',
        'ÃÂ¿' => 'p', 'Ã‘Â€' => 'r', 'Ã‘Â' => 's', 'Ã‘Â‚' => 't', 'Ã‘Âƒ' => 'u', 'Ã‘Â„' => 'f', 'Ã‘Â…' => 'h', 'Ã‘Â†' => 'c',
        'Ã‘Â‡' => 'ch', 'Ã‘Âˆ' => 'sh', 'Ã‘Â‰' => 'sh', 'Ã‘ÂŠ' => '', 'Ã‘Â‹' => 'y', 'Ã‘ÂŒ' => '', 'Ã‘Â' => 'e', 'Ã‘ÂŽ' => 'yu',
        'Ã‘Â' => 'ya',

        // Ukrainian
        'ÃÂ„' => 'Ye', 'ÃÂ†' => 'I', 'ÃÂ‡' => 'Yi', 'Ã’Â' => 'G',
        'Ã‘Â”' => 'ye', 'Ã‘Â–' => 'i', 'Ã‘Â—' => 'yi', 'Ã’Â‘' => 'g',

        // Czech
        'Ã„ÂŒ' => 'C', 'Ã„ÂŽ' => 'D', 'Ã„Âš' => 'E', 'Ã…Â‡' => 'N', 'Ã…Â˜' => 'R', 'Ã… ' => 'S', 'Ã…Â¤' => 'T', 'Ã…Â®' => 'U',
        'Ã…Â½' => 'Z',
        'Ã„Â' => 'c', 'Ã„Â' => 'd', 'Ã„Â›' => 'e', 'Ã…Âˆ' => 'n', 'Ã…Â™' => 'r', 'Ã…Â¡' => 's', 'Ã…Â¥' => 't', 'Ã…Â¯' => 'u',
        'Ã…Â¾' => 'z',

        // Polish
        'Ã„Â„' => 'A', 'Ã„Â†' => 'C', 'Ã„Â˜' => 'e', 'Ã…Â' => 'L', 'Ã…Âƒ' => 'N', 'ÃƒÂ“' => 'o', 'Ã…Âš' => 'S', 'Ã…Â¹' => 'Z',
        'Ã…Â»' => 'Z',
        'Ã„Â…' => 'a', 'Ã„Â‡' => 'c', 'Ã„Â™' => 'e', 'Ã…Â‚' => 'l', 'Ã…Â„' => 'n', 'ÃƒÂ³' => 'o', 'Ã…Â›' => 's', 'Ã…Âº' => 'z',
        'Ã…Â¼' => 'z',

        // Latvian
        'Ã„Â€' => 'A', 'Ã„ÂŒ' => 'C', 'Ã„Â’' => 'E', 'Ã„Â¢' => 'G', 'Ã„Âª' => 'i', 'Ã„Â¶' => 'k', 'Ã„Â»' => 'L', 'Ã…Â…' => 'N',
        'Ã… ' => 'S', 'Ã…Âª' => 'u', 'Ã…Â½' => 'Z',
        'Ã„Â' => 'a', 'Ã„Â' => 'c', 'Ã„Â“' => 'e', 'Ã„Â£' => 'g', 'Ã„Â«' => 'i', 'Ã„Â·' => 'k', 'Ã„Â¼' => 'l', 'Ã…Â†' => 'n',
        'Ã…Â¡' => 's', 'Ã…Â«' => 'u', 'Ã…Â¾' => 'z'
    );

    $str = preg_replace( array_keys( $options['replacements'] ), $options['replacements'], $str );

    if ( $options['transliterate'] ) {
        $str = str_replace( array_keys( $char_map ), $char_map, $str );
    }

    $str = preg_replace( '/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace( '/(' . preg_quote( $options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = substr( $str, 0, ( $options['limit'] ? $options['limit'] : strlen( $str ) ) );
    $str = trim( $str, $options['delimiter'] );

    return $options['lowercase'] ? strtolower( $str ) : $str;

}