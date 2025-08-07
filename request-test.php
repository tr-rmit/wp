<?php
  error_reporting(0);
  if (isset($_GET['viewsource'])) {
    echo "<pre>\n";
    echo "---------- BEGIN SOURCE CODE ------------\n";
    foreach(file($_SERVER['SCRIPT_FILENAME']) as $i => $line)
      printf("%3u: %1s \n",$i,rtrim(htmlentities($line)));
    echo "---------- END  SOURCE  CODE ------------\n";
    echo "</pre>\n\n";
  } 

  function preShow($vP)
  {
    echo "<pre>";
    print_r($vP);
    echo "</pre>";
  }

  function qdb ($str) {
    echo "<span style='color:#bbb;'>$str</span><br>";
  }

  function processRequestData() {
    
//  Check that there is a referring page, that something is being delivered to the form
    
    if (!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] !=	'https') {
      echo "<hr><h2>Notice: Insecure HTTP Protocol</h2><p>You should submit form data over https and not plain http.</p>";
      return false;
    }
    if (empty($_SERVER['HTTP_REFERER']) && empty($_GET['ref'])) {
      //preShow($_SERVER);
      echo "<hr><h2>Notice: No Referer</h2><p>A request for this page originated directly or from a locally hosted file, this script is optimised to receive requests from a hosted webpage's form.</p>";
      return false;
    }

    if (empty($_POST) && empty($_GET)) {
      echo "<hr><h2>Notice: No POST or GET Data</h2><p>This processing script provides advice when you submit POST or GET data from a web form.</p><p>Make sure that you set your form's method attribute to 'post' or 'get' for detailed feedback</p><p>Also check that your fields have name attributes as well as id attributes.</p>";
      return false;
    }    

// All good, referrer can be identified, form data can be processed.
    
    $referer = '';
    echo "<p>Data received from the following url:<br/><a href='{$_SERVER['HTTP_REFERER']}'>{$_SERVER['HTTP_REFERER']}</a></p>";
    $here = $_SERVER['HTTP_REFERER']; 
    $bits = explode('?',$here);
    $bits = explode('/',$bits[0]); 
    $bits = explode('.',$bits[count($bits)-1]); 
    $referer = $bits[0];
    return true;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test Request</title>
  <style>
    html {
      background-image:url('/~e54061/img/card-back-blue.png');
      padding:0px;
      margin:0px;
      font-family:monospace;
      font-size:1.3em;
      color:#111;
      height:100%;
    }
    body {
      background-color:#fff;
      width:90%;
      min-height:90%;
      min-width:600px;
      margin:10px auto;
      padding:20px;
      box-shadow: 0 0 10px #000;
      border-radius: 10px;
    }
    a,
    p span,
    h4 span,
    pre,
    .r
    {color: #B00;}
    h1 {text-align: center;}
    h1, h2, form {margin:10px;}
    p,pre {margin-left:30px; word-wrap: break-word; white-space: pre-wrap;}
  </style>
</head>
<body ondblclick="window.scrollTo(0,0);">
  <div>

    <h1>&star; Request Test &star;</h1>
    <?php
      processRequestData();
    ?>
    <hr/>
    <details>
      <summary>More Details on your $_POST and $_GET data</summary>
      <h2>&lt;form method='post' ... &gt;</h2>
      <?php
      if (!empty($_POST))
        preShow($_POST);
      else
        echo "<p><span>Nothing has been submitted using the post method.</span></p>";
      ?>
      <h2>&lt;/form&gt;</h2>
      <hr/>

      <h2>&lt;form method='get' ... &gt;</h2>
      <?php
      if (!empty($_GET)) {
        preShow($_GET);
      }
      else
        echo "<p><span>Nothing has been submitted using the get method.</span>";
      ?>
      <h2>&lt;/form&gt;</h2>
    </details> 
    <hr style="margin-bottom:50px;"/>
    <p>To view the PHP code in this processing script, add "?viewsource" to the end of the url in the browser address bar.</p>
  </div>
  <hr>
  <form method=post>
    <button name=testpostname value=testpostvalue>Click to test the post method.</button> 
  </form>
  <form method=get>
    <button name=testgetname value=testgetvalue>Click to test the get method.</button> 
  </form>
</body>
</html>