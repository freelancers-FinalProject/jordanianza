<?php 
include('language.php');
    $en_select='';
    $ar_select='';
     $language='';

       if ((isset($_GET['language']) && $_GET['language']=='en'  ) || !isset($_GET['language']  )  ) {
           
        $en_select='selected';
        $language='en';

       }else{
        $ar_select='selected'; 
        $language='ar';
       }
       
       
       
       ?>
       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 <body>
            <div id="container">
            <div id="nav_bar" >
<ul>
    <li><a href="lang.php"><?php echo $top_nav [$language]['0']  ?> </a></li>
    <li><a href="lang.php"><?php echo $top_nav [$language]['1']  ?> </a></li>
    <!-- <select> -->
        <select onchange="set_language()" name="language" id="language"  >
       
       
       
       
        <option value="en" <?php echo $en_select='selected'; ?> >en </option>
        <option value="ar" <?php echo  $ar_select='selected';?> >ar </option>
</select>
    </ul>
            </div>
            <div id="content" >
<P> <?php echo $website_content [$language]['0']  ?> </p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script>
    function set_language(){
        var language = jQuery('#language').val();
        window.location.href='http://localhost/ASYA/lang.php#?language='+language;

    }

</script>

</body>

</html>

