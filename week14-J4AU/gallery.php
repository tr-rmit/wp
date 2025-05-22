<?php 
  $title='Gallery';
  include('includes/header.inc');
?>

  <main>
    <h1>Countries Gallery</h1>
    <p><select onchange="filterby(this.value)">
    <option value="">Show all Authors</option>
    <?php 
        $countries = mysqli_query($conn, "select DISTINCT username from country order by username ASC");
        while($row = mysqli_fetch_assoc($countries)) {
          echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
        }
      ?>
    </select></p>
    <div id="gallery">
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
      console.log(username);
      let galleryitems = document.querySelectorAll('.gallery-item');
      for(let i=0; i<galleryitems.length; i++) {
        galleryitems[i].style.display = 'inline-block';
      }
      if (username.trim().length==0) return;
      for(let i=0; i<galleryitems.length; i++) {
        if (!galleryitems[i].classList.contains(username)) {
          galleryitems[i].style.display = 'none';
        }
      }
    }
  </script>
<?php include('includes/footer.inc'); ?>