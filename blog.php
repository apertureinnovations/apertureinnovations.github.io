<?php


class CommentSection {
    public $commentsection = [];

    function construct($commentsection){
        $this->commentsection = $commentsection;
    }

    function initFile() {
        $this->commentsection = json_decode(file_get_contents("comments.json"), true);
    }

    function readComment() {
        return $this->commentsection;
    }
    
    function addComment($commentData) {
        $this->commentsection[] = $commentData;
    }

    function uploadComment($commentsection) {
        file_put_contents("comments.json",json_encode($commentsection));

    }
}

$data = new CommentSection();
$data->initFile();
if(isset($_POST['commentSubmit'])){
    $uData = $_POST['name']; 
    $cData = $_POST['commentData'];
}   $arr = array($uData,$cData);
    $data->addComment($arr);
    if ($uData != null && $cData != null) {
        $data->uploadComment($data->commentsection);
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Aperture Unlimited</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body class="">

    <!-- NAVBAR -->
    <div class="navNavbar">

      <div class="navNavGroup checkDisplay">
        <a class="navNavItem" href="index.html">Home</a>
      </div>
      <div class="navNavGroup checkDisplay">
        <a class="navNavItem" href="contact.html">Contact</a>
        <a class="navNavItem " href="extras.html">Projects</a>
      </div>
      <a class="navNavItem navActive" href="blog.html">Blog</a>
      <a class="navHide navHamBurger"><i class="fa fa-bars"></i></a>
    </div>
    <div class="box-normal-flattop back-transparent">
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil esse facilis labore ipsum quae aliquam ea fuga! Accusamus ipsa vel incidunt, ratione voluptatem minima, pariatur numquam necessitatibus culpa veniam eius!</p>
    </div>

    <form class="box-normal-flattop back-transparent" action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input required pattern=".*\S+.*" type="text" class="form-control" id="username" name="name" placeholder="Enter Name">
            <label for="comment">Comment</label>
            <input required pattern=".*\S+.*" type="text" class="form-control" id="comment" name="commentData" placeholder="What do YOU think about this topic?">
        </div>
        <button type="submit" class="btn btn-primary" name="commentSubmit">Submit</button>
    </form>

    <!-- COMMENT SECTION -->
    <div id="commentsBox" class="box-normal-flattop back-transparent">

      <script>
        const comments = <?= json_encode($data->readComment()) ?>;

        comments.forEach(comment => {
            document.getElementById("commentsBox").innerHTML += `
                <div class="box-normal sideBorder margin-five">
                    <p>${comment.comment}<br><br><span class="font-semibold">${comment.username}</span></p>
                </div>
            `;
        });
      </script>

    </div>

    <!-- FOOTER -->
    <div class="footerContainer">
      <hr class="back-dark">
      <div class="footerItems">
        <p class="textButton" onclick="showSources()">Sources</p>
        <p class="textButton" onclick="backToTop()">Back to Top</p>
        <p class="">© Lily Palmer 2026</p>
      </div>
      <div id="sources" class="align-left sources">
        <a class="textButton" href="https://api.jquery.com/">jQuery</a>
        <p></p>
        <a class="textButton padding-five-b" href="https://getbootstrap.com/">Bootstrap</a>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>

</html>