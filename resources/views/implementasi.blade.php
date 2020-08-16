<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Implementasi OCR dengan Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
            crossorigin="anonymous">

        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="container" style="margin-top:50px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Implementasi OCR
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="Igambar" id="Igambar">
                            <button type="button" name="btn" id="analisa" class="btn btn-primary">Analisa</button>
                        </div>
                        <br>
                        <div>
                            <img src="" id="gambar">
                        </div>
                        <br>
                        <div id="hasil"></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('document').ready(function(){
            $("#analisa").click(function(){
                alert('button di click')
                var fd = new FormData();
                var files = $('#Igambar')[0].files[0];
                fd.append('gambar',files);

                $.ajax({
                    url: "http://http://vision.ramdhanrizki.net/api/ocr",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);
                        // if(response != 0){
                        //     $("#img").attr("src",response); 
                        //     $(".preview img").show(); // Display image element
                        // }else{
                        //     alert('file not uploaded');
                        // }
                    },
                    error : function(err) {
                        console.log(err)
                    }
                });
            })
        })
       
        
    </script>
</html>
