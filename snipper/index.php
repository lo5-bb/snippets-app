<html>
  <head>
   <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form action="example.html" metod="post">
      <textarea name="code">  
      </textarea>
    </form>
    <div>
    <?php
    file_get_contents('example.html');
    ?>
    </div>
  </body>

</html>
