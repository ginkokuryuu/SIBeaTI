<div style="margin-left:5%;">
    <div class="row">
        <div class=" col-md-5">
            <h1 class="h2">Upload File Mutasi</h1>
            <p>Hal yang perlu diperhatikan :</p>
            <ul>
            <li>Format isian disesuaikan dengan <a href="<?= site_url('bendahara/upload/downloadFormat') ?>">UploadMutasi.csv</a></li>
            <li>File berformat .csv</li>
            <li>Pastikan format csv dipisah menggunakan koma (,). (Jika bukan koma, bisa dirubah dengan cara mengganti Regional Format di Setting menjadi English (United States))</li>
            <li>Pastikan nama file yang di upload adalah UploadMutasi.csv</li>
            </ul>
            <div class="form-inline">
                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <form action="<?= site_url("bendahara/upload/uploadAction") ?>" method="POST" id="form" enctype="multipart/form-data">
                    <input type="file" name="userfile" class="form-control mb-2 mr-sm-2" id="file">
                </form>    
                <button class="btn btn-primary mb-2" onclick = "validateFile()">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    var filename;

    function validateFile(){        
        var f = document.getElementById("file");
        if(f.value == ""){
            alert("Please upload a file!");
        }
        else{
            if(filename != 'UploadMutasi.csv')
            {
                alert('nama file tidak sesuai');
            }
            else{
                document.getElementById("form").submit();
            }
        }
    }

    function hasExtension(file, exts) {
        var fileName = file.value;
        return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    }

    $(document).ready(function(){
        $("#file").on("change", function(e) {
            filename = e.target.files[0].name;
        })
    });
</script>