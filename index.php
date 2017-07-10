<!doctype html>
<html>
<head>
<title>F5buddy Image uploading code</title>
    <?php
    include("config.php");
 
    if(isset($_POST['but_upload'])){
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Check Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Insert record
            $query = "insert into images(name,image) values('".$name."','".$image."')";
           
            mysqli_query($con,$query) or die(mysqli_error($con));
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }
    
    }

   $query1 = mysqli_query($con,"select * from images");
  
   $data = array();
   while($row = mysqli_fetch_object($query1)){
     $data[] = $row;
   }
   ?>
<body>
    <form method="post" action="" enctype='multipart/form-data'>
        <input type='file' name='file' />
        <input type='submit' value='Save name' name='but_upload'>
        
    </form>
    <?php
        //print_r($result);
        foreach ($data as $value){
           echo  '<img src="'.$value->image.'" alt="Red dot" width="300" />'."<br>";
        }
    ?>

</body>
</html>
