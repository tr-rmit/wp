<?php 
  $title='Gallery';
  include('includes/header.inc');
?>

  <main>
    <h1>Countries Gallery</h1>
    <p><select onchange="filterby(this.value)"> <!-- like A1's window.location=this.value-->
      <option value="">Show all Authors</option>
      <?php 
        $countries = mysqli_query($conn, "select DISTINCT username from country order by username ASC");
        while($row = mysqli_fetch_assoc($countries)) {
          echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
        }
      ?>
      <option value="sdfsdfbahjgashjfhsahsahjfadhjfsajkhfkjals">Show None</option>
    </select></p> 
    <div id="gallery">
      <p id="secretmessage">Oh dear, no images were uploaded by that person</p>
<?php 
  $countries = mysqli_query($conn, "select * from country");
  while($row = mysqli_fetch_assoc($countries)) {
  echo <<<"CDATA"
      <div class="gallery-item {$row['username']}">
        <h3>{$row['countryname']} <i>- by {$row['username']}</i></h3>
        <img src="userimages/{$row['image']}" alt="{$row['caption']}">
        <p><a href="country.php?countryid={$row['countryid']}">Read More</a></p>
      </div>

CDATA;
  }
?>
    </div>
  </main>
  <script>
    /* Let's pretend this is an external javascript file */
    function filterby(username) {
      document.getElementById('secretmessage').style.display='none';
      let galleryitems = document.querySelectorAll('.gallery-item');
      for(let i=0; i<galleryitems.length; i++) {
        galleryitems[i].style.display = 'inline-block';
      }
      //console.log(username);
      if (username.trim().length==0) return;
      let somefound = false;
      for(let i=0; i<galleryitems.length; i++) {
        if (!galleryitems[i].classList.contains(username))
          galleryitems[i].style.display = 'none';
        else 
          somefound = true;
      }
      if (!somefound) 
        document.getElementById('secretmessage').style.display='block';

    }
  </script>
<?php include('includes/footer.inc'); ?>