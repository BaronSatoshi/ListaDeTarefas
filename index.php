<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/3dfd196d26.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Lista de Tarefas</title>
</head>
<body>
    <div class="wrapper">
        <h2 class="title">Lista de a Fazer</h2>
        <div class="inputFields">
            <input type="text" id="taskValue" placeholder="Entre com a tarefa">
            <button type="submit" id="addBtn" class="btn"><i class="fa fa-plus"></i></button>
        </div>
        <div class="content">
            <ul id="tasks">
                
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            //Mostrar as tarefas
            function loadTasks(){
                $.ajax({
                url: "show-tasks.php",
                type: "POST",
                success: function(data){
                    $("#tasks").html(data);
                }
            });
            }

            loadTasks();
            //adicionar uma tarefa

            $("#addBtn").on("click", function(e){
                e.preventDefault();

                var task = $("#taskValue").val();

                $.ajax({
                    url:"add-task.php",
                    type: "POST",
                    data: {task: task },
                    success: function(data){
                        loadTasks();
                        $("#taskValue").val('');
                        if(data == 0){
                            alert("Algo deu errado. Por favor tente novamente.") 
                        }
                    }
                });

            });

            //Remover Tarefa
            $(document).on("click", "#removeBtn", function(e){
                e.preventDefault();
                var id = $(this).data('id');
                
                $.ajax({
                    url: "remove-task.php",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        loadTasks();
                        if(data == 0){
                            alert("Algo deu errado. Por favor tente novamente.")
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>