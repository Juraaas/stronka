<?php
global $link; 
function PokazPodstrone($page_title)  
{
    include('cfg.php'); 
    $query = 'SELECT * FROM page_list WHERE page_title="'.$page_title.'" LIMIT 1'; 
    if($result = mysqli_query($link, $query))
    {
         if(mysqli_num_rows($result) > 0) 
         {
             while($row = mysqli_fetch_array($result)) 
             {
                 echo $row['page_content']; 
             }
             mysqli_free_result($result); 
         }   // funkcja pobierająca informacje z bazy danych a następnie wysietlająca zawartosc podstrony
    }
    mysqli_close($link);
}
?>