<?php if (isset($_SESSION['message'])) : ?>
    <div class="msg text-white <?php echo $_SESSION['type']; ?>">
      <li><?php echo $_SESSION['message']; ?></li>
      <?php
         unset($_SESSION['message']);
         unset($_SESSION['type']);
      
      ?>
    </div>
  <?php endif; ?>