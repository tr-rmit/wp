<?php 
  $title = "Home";
  // this helps to eliminate CSS caching issues
  $lastModTime = filemtime("style.css"); 
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo - <?= $title ?></title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= $lastModTime ?>">
    <script src='../wireframe.js'></script>
  </head>

  <body>

    <header>
      <div>Put company logo and name here</div>
    </header>

    <nav>
      <div>Put website navigation links here</div>
    </nav>

    <main>
      <aside id='Website Under Construction'>
    <!-- Creative Commons image sourced from https://pixabay.com/en/maintenance-under-construction-2422173/ and used for educational purposes only -->
        <img src='../../media/website-under-construction.png' alt='Website Under Construction' />
      </aside>
      <section>
        <h2>Our New Seats!</h2>
        <img src='../../media/Profern-Standard-Twin.png' alt='Standard Seat' />
        <img src='../../media/Profern-Verona-Twin.png' alt='First Class Seat' />
      </section>
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
