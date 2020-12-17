function warpedCaptcha($text)
4   {
5    /*
6     this function takes the original captcha text and shuffles
7     the vowels + y around in order to deliver more variable
8     captcha text
9    */
10    if (5 > rand(0,6)) return $text;
11    //only parttime warping
12    $ltrs = array('b'=>'b','c'=>'c','d'=>'d','f'=>'f','g'=>'g','h'=>'h','j'=>'j',
13                'k'=>'k','l'=>'l','m'=>'m','n'=>'n','p'=>'p','q'=>'q','r'=>'r',
14                's'=>'s','t'=>'t','v'=>'v','w'=>'w','x'=>'x','z'=>'z');
15
16   $vkeys = $vltrs = explode(',','a,e,i,o,u,y');
17   shuffle($vkeys);
18   $vowels = array();
19   foreach($vkeys as $ndx=>$vkey) $vowels[$vkey] = $vltrs[$ndx];
20   //the vowels + y are now jumbled up
21
22   $ltrs = array_merge($ltrs,$vowels);
23   //full associative array of alphabet with randomized vowels + y
24   $text = str_split($text);
25
26   $captcha = '';
27   foreach($text as $txt) $captcha .= $ltrs[$txt];
28   return $captcha;
29  }
30
31  /*
32   xsixlw.txt is a long string of 6 letter words concatenated together.
33   We pick a word at random from this text
34  */
35  $fp = fopen('xsixlw.txt',"r");
36  $count = filesize('xsixlw.txt')/6 - 1;
37  $pos = 6*rand(0,$count);
38  fseek($fp,$pos);
39  $captcha = warpedCaptcha(trim(fread($fp,6)));
40  fclose($fp);
41
42  session_start();
43  $_SESSION['captcha'] = $captcha;
44  //store the captcha to check later once the user has solved it
45  session_write_close();
46
47  $im = imagecreatetruecolor(200,70);//200 x 70 pixel image
48  $black = imagecolorallocate($im,0,0,0);
49  imagecolortransparent($im,$black);//give it a black background
50
51  switch(rand(0,4))
52  {
53   case 0:$color = imagecolorallocate($im,34,155,91);break;
54   case 1:$color = imagecolorallocate($im,233,26,74);break;
55   case 2:$color = imagecolorallocate($im,233,26,195);break;
56   case 3:$color = imagecolorallocate($im,244,178,19);break;
57   case 4:$color = imagecolorallocate($im,53,125,199);break;
58  }
59  //pick a random color for the text
60
61  $x = 20;$y = 47;//the starting position for drawing
62  for ($i=0;$i<6;$i++)
63  {
64   $angle = rand(-8,8) + rand(0,9)/10;
65   $fontsize = rand(22,32);//pick a random font size
66   $letter = substr($captcha,$i,1);
  $coords = imagettftext($im,$fontsize,$angle,$x,$y,$color,'oldsans.ttf',$letter);
   //draw each letter
69   $x += ($coords[2]-$x) + 1;
70  }
71
 header('Content-type:image/png');
 imagepng($im);
 imagedestroy($im);
 ?>