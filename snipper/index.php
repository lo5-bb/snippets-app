<html>
  <head>
   <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form action="example.html" metod="post">
      <textarea name="code">  
      </textarea>'
      <input type="submit" value="OK"/>
    </form>
    <div>
    <?php
    file_get_contents('example.html');
    ?>
    </div>
  </body>

</html>
