<?php 

// session_start();

include("path.php");

include(IN_DIR . "../app/controllers/topics.php"); 

$posts = array();
$postsTitle = 'Recent Posts';

// for search 
if (isset($_POST['search_q']))
{
  // dd($_POST);
  $postsTitle = "You searched for '" . $_POST['search_q'] . "'";
  $posts = searchPosts($_POST['search_q']);
}else{
  $posts = selectAll('posts', ['published' => 1]);
  // $posts = getPublishedPosts();

}
// $posts = selectAll('posts', ['published' => 1]);
// $posts = getPublishedPosts();
// dd($posts);


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="TemplateMo">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">


  <title>Cakahal PHP Class</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/msg.css">

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <?php include(IN_DIR . "../app/includes/header.php"); ?>




  <!-- includes php header -->

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="main-banner header-text">
    <div class="container-fluid">
      <div class="owl-banner owl-carousel">
      <?php foreach($posts as $post) : ?>
        <div class="item">
          <!-- <img src="assets/images/banner-item-01.jpg" alt=""> -->
          <img src="<?php echo BASE_URL . '../assets/images/image/' . $post['image']; ?>" alt="">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>HighLights...</span>
              </div>
              <a href="post-details.php?=id=<?php echo $post['id']; ?> ">
                <h4><?php echo $post['title'] ;?></h4>
              </a>
              <ul class="post-info">
                <!-- <li><a href="#"><?php // echo $post['username']; ?></a></li> -->
                <li><a href="#"><?php  echo $post['id']; ?></a></li>
                <li><a href="#"><?php echo date('F j, Y', strtotime($post['created_at'])) ;?></a></li>
                <li><a href="#">12 Comments</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php endforeach ;?>
       
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->

<!-- for messages TODO -->
<?php include(IN_DIR . "/app/includes/messages.php"); ?>


  <section class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-content">
            <div class="row">
              <div class="col-lg-8">
                <span>Cakahal Blog HTML5 Template</span>
                <h4>Creative HTML Template For Bloggers!</h4>
              </div>
              <div class="col-lg-4">
                <div class="main-button">
                  <a rel="nofollow" href="#" target="_parent">Download Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <!-- ================== Recent Post =================== -->
              <?php foreach($posts as $Rp) : ?>
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <!-- <img src="assets/images/blog-post-01.jpg" alt=""> -->
                    <img src="<?php echo BASE_URL . '../assets/images/image/' . $Rp['image']; ?>" alt="">
                  </div>
                  <div class="down-content">
                    <span>Class Project</span>
                    <a href="post-details.php?=id=<?php echo $Rp['id']; ?> ">
                      <h4><?php echo $Rp['title'] ;?></h4>
                    </a>
                    <ul class="post-info">
                      <!-- <li><a href="#"><?php // echo $post['username']; ?></a></li> -->
                      <li><a href="#"><?php echo $Rp['id']; ?></a></li>
                      <li><a href="#"><?php echo date('F j, Y', strtotime($Rp['created_at'])) ;?></a></li>
                      <li><a href="#">12 Comments</a></li>
                    </ul>
                    <p><?php echo html_entity_decode(substr($Rp['body'], 0, 150) . '...');?>
                    <a rel="nofollow" href="post-details.php?=id=<?php echo $Rp['id']; ?> " target="_parent">...Cakahal Johnson</a> for more info. Thank you.
                  </p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <li><a href="#">Beauty</a>,</li>
                            <li><a href="#">Nature</a></li>
                          </ul>
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>

              <!-- ============Recents Post ends above =============== -->
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="blog.html">View All Posts</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="row">
              <div class="col-lg-12">
                <div class="sidebar-item search">
                  <!-- ===================== search section ==================== -->
                  <form id="search_form" name="sq" method="POST" action="index.php">
                    <input type="text" name="search_q" class="searchText" placeholder="type to search..." autocomplete="on">
                  </form>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                  <div class="sidebar-heading">
                    <!-- ==================== Rescent Post Section ============================== -->
                    <h2><?php echo $postsTitle ?></h2>
                  </div>
                  <div class="content">
                    <ul>
                      <li><a href="post-details.html">
                          <h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
                          <span>May 31, 2020</span>
                        </a></li>
                      <li><a href="post-details.html">
                          <h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
                          <span>May 28, 2020</span>
                        </a></li>
                      <li><a href="post-details.html">
                          <h5>Swag hella echo park leggings, shaman cornhole ethical coloring</h5>
                          <span>May 14, 2020</span>
                        </a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item categories">
                  <div class="sidebar-heading">
                    <h2>Categories</h2>
                  </div>
                  <div class="content">
                    <ul>
                      
                    <?php foreach($topics as $key => $topic) : ?>
                      <li><a href="#">- <?php echo $topic['name']; ?></a></li>
                    <?php endforeach; ?>
                      <!-- <li><a href="#">- Nature Lifestyle</a></li> -->
                      <!-- <li><a href="#">- Awesome Layouts</a></li>
                      <li><a href="#">- Creative Ideas</a></li>
                      <li><a href="#">- Responsive Templates</a></li>
                      <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                      <li><a href="#">- Creative &amp; Unique</a></li> -->
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item tags">
                  <div class="sidebar-heading">
                    <h2>Tag Clouds</h2>
                  </div>
                  <div class="content">
                    <ul>
                      <li><a href="#">Lifestyle</a></li>
                      <li><a href="#">Creative</a></li>
                      <li><a href="#">HTML5</a></li>
                      <li><a href="#">Inspiration</a></li>
                      <li><a href="#">Motivation</a></li>
                      <li><a href="#">PSD</a></li>
                      <li><a href="#">Responsive</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php include("app/includes/footer.php"); ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/isotope.js"></script>
  <script src="assets/js/accordions.js"></script>

  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>