<div style="margin-left:5%; margin-right:5%;">
    <div id="saldo_sekarang" style="display: none;">2298000</div>
    <div style="margin-bottom: 3%;">
        <h3>Hitung berdasar jumlah penerima</h3>
        <form action="<?= site_url('bendahara/perencanaan/create') ?>" method="POST" id='create-form'>
            <input type="text" id="inputJumlah" name="jumlah" placeholder="Jumlah Penerima"/>
            <a href="#" class="btn btn-primary" onclick="calculateByJumlah()">Hitung</a>
            <div style="display: none;">
                <div>
                    <label for="nominal">Hasil nominal yang bisa di salurkan per orang :</label>
                    <input type="text" id="resultByJumlah" name="nominal" placeholder="Hasil" readonly/>
                </div>
                <div>
                    <label for="untuk_periode">Untuk periode :</label>
                    <input type="text" id="periode" name="untuk_periode" placeholder="Bulan-Tahun" required/>
                </div>
                <input class="btn btn-secondary" type="submit" name="submit" value="Simpan"/>
            </div>
        </form>
    </div>
    <div>
        <h3>Hitung berdasar nominal penyaluran</h3>
        <form action="<?= site_url('bendahara/perencanaan/create') ?>" method="POST" id='create-form'>
            <input type="text" id="inputNominal" name="nominal" placeholder="Nominal Penyaluran"/>
            <a href="#" class="btn btn-primary" onclick="calculateByNominal()">Hitung</a>
            <div style="display: none;">
                <div>
                    <label for="jumlah">Hasil jumlah orang yang bisa diberi beasiswa :</label>
                    <input type="text" id="resultByNominal" name="jumlah" placeholder="Hasil" readonly/>
                </div>
                <div>
                    <label for="untuk_periode">Untuk periode :</label>
                    <input type="text" id="periode" name="untuk_periode" placeholder="Bulan-Tahun" required/>
                </div>
                <input class="btn btn-secondary" type="submit" name="submit" value="Simpan"/>
            </div>
        </form>
    </div>
</div>

<script>
var saldoSekarang = document.getElementById('saldo_sekarang').innerHTML;

var resultJumlah = document.getElementById('resultByJumlah');
var resultJumlahContainer = resultJumlah.parentElement.parentElement;

var resultNominal = document.getElementById('resultByNominal');
var resultNominalContainer = resultNominal.parentElement.parentElement;

function calculateByJumlah(){
    var jumlah = document.getElementById('inputJumlah').value;
    
    var result = saldoSekarang / jumlah;
    
    resultJumlah.value = Math.floor(result/100000) * 100000;
    resultJumlahContainer.style.display = 'block';
    resultNominalContainer.style.display = 'none';
}

function calculateByNominal(){
    var nominal = document.getElementById('inputNominal').value;
    
    var result = saldoSekarang / nominal;
    
    resultNominal.value = Math.floor(result);
    resultNominalContainer.style.display = 'block';
    resultJumlahContainer.style.display = 'none';
}

</script>