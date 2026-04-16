<?php
  $navlinks = [
    'index' => 'Home',
    'books' => 'Books',
    'new_book' => 'New Book',
    'gallery' => 'Gallery'
  ];
?>
    <nav class="navbar navbar-expand-sm bg navbar-dark mb-3 rounded">
      <ul class="navbar-nav">
<?php 
  foreach($navlinks as $pageLink => $pageTitle) {
    $active = ($title == $pageTitle ? 'active' : '');
    echo <<<"CDATA"
        <li class="nav-item">
          <a class="nav-link $active" href="$pageLink.php">$pageTitle</a>
        </li>

CDATA;    
  }
?>
      </ul>
    </nav>
