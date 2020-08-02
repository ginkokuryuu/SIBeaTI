<div class='border shadow overlay' id='ov-pecah'>
    <div class='header'>
        <h2 style='float: left;'>Edit</h1>
        <div class='close-btn' style='float: right;'>
            <button style='background: none; border: none; color: white; font-size: 130%;' onclick='closePecah()'>x</button>
        </div>
    </div>
    <div class='content'>
        <form action="<?= site_url('bendahara/edit/pecah') ?>" method="POST" id='pecah-form'>
            <div class="form-group form-pecah">
                <label for="pecahan">Detail pecahan</label>
                <div class='form-inline'>
                    <input type="text" class="form-control" name="pc-deskripsi[]" style="margin-right:1%" placeholder="Deskripsi Pecahan" value="Deskripsi Pecahan" required></input>
                    <input type="text" class="form-control" name="pc-debit[]" style="margin-right:1%" placeholder="Debit" required></input>
                    <input type="text" class="form-control" name="pc-kredit[]" style="margin-right:1%" placeholder="Kredit" required></input>
                    <input type="text" class="form-control" name="pc-inisial_donatur[]" style="margin-right:1%" placeholder="inisial_donatur" required></input>
                    <a href="#" class="remove_field" style='margin-left:1%; display:none;'>Remove</a>
                </div>
                <div class='form-inline' style="margin-top:1%;">
                    <input type="text" class="form-control" name="pc-deskripsi[]" style="margin-right:1%" placeholder="Deskripsi Pecahan" value="Deskripsi Pecahan" required></input>
                    <input type="text" class="form-control" name="pc-debit[]" style="margin-right:1%" placeholder="Debit" required></input>
                    <input type="text" class="form-control" name="pc-kredit[]" style="margin-right:1%" placeholder="Kredit" required></input>
                    <input type="text" class="form-control" name="pc-inisial_donatur[]" style="margin-right:1%" placeholder="inisial_donatur" required></input>
                    <a href="#" class="remove_field" style='margin-left:1%; display:none;'>Remove</a>
                </div>
            </div>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Format debit kredit tanpa koma ataupun titik, kalau kosong isi dengan 0 (contoh 20000000)
            </small>
            <button class="add_field_button btn btn-primary">Add More Fields</button>
            <input type="hidden" name='pc-id' id='pc-id' required>
            <input type="hidden" name='pc-debit_awal' id='pc-debit_awal' required>
            <input type="hidden" name='pc-kredit_awal' id='pc-kredit_awal' required>
            <input type="hidden" name='pc-tanggal' id='pc-tanggal' required>
            <input type="hidden" name='pc-periode' id='pc-periode' required>
            <input type="hidden" name='pc-akun' id='pc-akun' required>
            <input type="hidden" name='pc-kategori' id='pc-kategori' required>
        </form>
    </div>
    <button class='btn btn-primary' style='margin-left: 3%;' onclick='submitPecahForm()'>Pecah</button>
</div>

<script>
$(document).ready(function() {
	var max_fields      = 10;
	var wrapper   		= $(".form-pecah");
	var add_button      = $(".add_field_button");
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(
                '<div class="form-inline" style="margin-top:1%;">' + 
                    '<input type="text" class="form-control" name="pc-deskripsi[]" style="margin-right:1%" placeholder="Deskripsi Pecahan" value="Deskripsi Pecahan" required></input>' +
                    '<input type="text" class="form-control" name="pc-debit[]" style="margin-right:1%" placeholder="Debit" value="0" required></input>' +
                    '<input type="text" class="form-control" name="pc-kredit[]" style="margin-right:1%" placeholder="Kredit" value="0" required></input>' +
                    '<input type="text" class="form-control" name="pc-inisial_donatur[]" style="margin-right:1%" placeholder="inisial_donatur" required></input>' +
                    '<a href="#" class="remove_field" style="margin-left:1%;">Remove</a>' +
                '</div>'
            ); //add input box
		}
	});

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
</script>