<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.1/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        function confirmacaoCad(){
    $(".validated").jqBootstrapValidation(
    {
        preventSubmit: true,
        submitError: function($form, event, errors) {.
        },
        submitSuccess: function($form, event) {
                swal({
            title: "Are you sure?",
            text: "You want to save as draft?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Draft it!",
            cancelButtonText: "No, cancel plx!"
        }).then((result) => {
            if(result.value){
                document.storyForm.action = "#";
                document.storyForm.submit();
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });   
    
        event.preventDefault();
        },
        filter: function() {
            return $(this).is(":visible");
        }
    });
}

    </script>
</head>
<body>
<h2>OLÁ MUNDO</h2>
<form action="#" method="post" onsubmit="msg_confimacao_cad()">
    <input type="text" class="validated" required>
<input type="submit" onclick="confirmacaoCad()">
</form>
</body>
</html>