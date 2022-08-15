<style>
  .flex{
    display:flex;
    flex-direction: column;
  }
  .img {
    height: 100px;
    width: 100px;
  background-position: center;
  margin: auto;
  border-radius: 50%;
  box-sizing: border-box;
  box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
  display:flex;
  justify-content: center;
  margin-top:10px;
  }
  .href{
    text-decoration: none;
  }
  .title{
    margin-top: 10px;
  font-weight: 900;
  font-size: 1.8rem;
  color: #3b5768;
  letter-spacing: 1px;
  display:flex;
  justify-content: center;

  padding-top:20px;
  }
  .title-repo{
    font-weight:900;
    font-size:1.8rem;
    color:black;
    letter-spacing:1px;
    display:flex;
    justify-content:center;
  }
</style>
   
          <?php
          // Create a stream
          $opts = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36'
            )
          );

          $context = stream_context_create($opts);

          // Open the file using the HTTP headers set above

          // $file = file_get_contents("https://api.github.com/users/$username/followers", false, $context);
          // $decode = json_decode($file);
          // echo "<pre>";
          // var_dump($decode);
          // echo "</pre>";

          // var_dump($file, 'submitted');

          // $repo = file_get_contents('https://api.github.com/users/otarza/repos', false, $context);
          // $decoded = json_decode($repo);
          // echo "<pre>";
          // var_dump($decoded);
          // echo "</pre>";
          // ?>

         


   <?php if(isset($_POST['submit'])){ ?>

   <?php  $username = $_POST['username'];
        $userChoice = $_POST['data'];
        // echo $username;
        // echo $userChoice;
   ?>
   <?php if($userChoice == "follower"): ?>
    
      <?php  $file = file_get_contents("https://api.github.com/users/$username/followers", false, $context);
          $decode = json_decode($file, true); 
          
          // var_dump($decode);
          // eecho "<pre>";
          echo "<h1 class='title-repo'>Followers</h1>";
            foreach($decode as $data){
              $login =  $data['login'] . "<br>";
              $url = $data['html_url'];
              echo "<a class='href' href='$url' target=_blank><h1 class='title'>$login</h1></a>";
              $image = $data['avatar_url'];
              echo "<a class='href' href='$url' target=_blank><img class='img' src=$image ></a>";
            }
          
            
          // }
          // echo "<pre>";
          // var_dump($decode[0]['avatar_url'] );
          // echo "<pre>"; -->
            
          ?>
      
      
         
    

    <?php endif; ?>

    <?php if($userChoice == "repositories"): 
      $repo = file_get_contents("https://api.github.com/users/$username/repos", false, $context);
      $decoded = json_decode($repo, true);
      // 
      echo "<h1 class='title-repo'>Repositories</h1>";
      foreach($decoded as $info){
        $name = $info['name'];
        
        echo "<a class='href' href='https://github.com/$username/$name' target=_blank><h1 class='title'>$name</h1></a>" . "</br>";

      }

      ?>

      <?php endif; ?>
<?php if($userChoice == "both"): 
    $file = file_get_contents("https://api.github.com/users/$username/followers", false, $context);
    $decode = json_decode($file, true);
    echo "<h1 class='title-repo'>Followers</h1>";
    foreach($decode as $data){
      $login =  $data['login'] . "<br>";
      $url = $data['html_url'];
      echo "<a class='href' href='$url' target=_blank><h1 class='title'>$login</h1></a>";
      $image = $data['avatar_url'];
      echo "<a class='href' href='$url' target=_blank><img class='img' src=$image ></a>";
    }

    
    echo "<br>";
    echo "<br>";
    echo "<h1 class='title-repo'>Repositories</h1>";
    $repo = file_get_contents("https://api.github.com/users/$username/repos", false, $context);
      $decoded = json_decode($repo, true);
      foreach($decoded as $keys => $info){
        $name = $info['name'];
        
        echo "<a class='href' href='https://github.com/$username/$name' target=_blank><h1 class='title'>$name</h1></a>" . "</br>";

      }

  
  ?>
  <?php endif; ?>

  <?php if($username== ""):  ?>
    
    <h1>There has been an error</h1>
   

    <?php endif; ?>
      
 <?php   } ?>
 

  
