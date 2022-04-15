<?php include('./header.php'); ?>
<head>
    <script>
        /*Source @ DevelopPHP.com || Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
        function _(el){
            return document.getElementById(el);
        }
        function uploadFile(){
            var file = _("pdf").files[0];
            // alert(file.name+" | "+file.size+" | "+file.type);
            var formdata = new FormData();
            formdata.append("pdf", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "upload.php");
            ajax.send(formdata);
        }
        function progressHandler(event){
            _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
        }
        function completeHandler(event){
            _("status").innerHTML = event.target.responseText;
            _("progressBar").value = 0;
        }
        function errorHandler(event){
            _("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event){
            _("status").innerHTML = "Upload Aborted";
        }
        </script>
</head>
<section class="container my-5">

    <h2>Upload Your PDF</h2>
    <form id="upload_form" enctype="multipart/form-data" method="post">
        <input type="file" name="pdf" id="pdf" class="form-control my-2" onkeyup="manage()" />
        <input type="button" id="btnSubmit" value="Upload File" onclick="uploadFile()" class="btn btn-success" disabled />
        <br/><br/>        
            <progress id="progressBar" value="0" max="100" style="width: 100%;"></progress>        
        <h3 id="status"></h3>
        <p id="loaded_n_total"></p>
    </form>

    <script>
        var pdfFile = document.getElementById('pdf');
        var btn = document.getElementById('btnSubmit');
        function manage() {
        if(pdfFile.type('file').length < 0) {
            btn.disabled = true;
        } else {
            btn.disabled = false;
        }
    }
    </script>
    
</section>
<?php include('./footer.php'); ?>