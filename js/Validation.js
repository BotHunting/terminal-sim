// Function to validate the form before submission
function validateForm() {
    var nomorKendaraan = document.getElementById("nomor_kendaraan").value;
    var trayek = document.getElementById("trayek").value;
    var waktuKedatangan = document.getElementById("waktu_kedatangan").value;
    var jumlahPenumpangMasuk = document.getElementById("jumlah_penumpang_masuk").value;

    // Check if any field is empty
    if (nomorKendaraan == "" || trayek == "" || waktuKedatangan == "" || jumlahPenumpangMasuk == "") {
        alert("Semua field harus diisi");
        return false;
    }

    // Check if jumlahPenumpangMasuk is a valid number
    if (isNaN(jumlahPenumpangMasuk) || jumlahPenumpangMasuk < 0) {
        alert("Jumlah Penumpang Masuk harus berupa angka positif");
        return false;
    }

    // Additional validation rules can be added here

    // If all validations pass, return true to submit the form
    return true;
}
