<?php

include 'config.php';

$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){

?>
<li>
    <span class="text" ><?php echo $row['titulo']; ?></span>
    <i id="removeBtn" class="icon fa fa-trash" data-id="<?php echo $row['id']; ?>"></i>
    
</li>



<?php
    }
    echo '<div class="pending-text">Você tem ' . mysqli_num_rows($result) . ' tarefas pendente</div>';
} else{
    echo "<li><span class='text'>Nenhum registro encontrado</span></li>";
}

?>