let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");
const tanggal = document.getElementById('tanggal');

menuicn.addEventListener("click", () => {
    nav.classList.toggle("navclose");
})

// Mendapatkan objek tanggal saat ini
var currentDate = new Date();

// Mendapatkan nilai-nilai tanggal, bulan, dan tahun
var day = currentDate.getDate();
var month = currentDate.getMonth() + 1; // Ingat, bulan dimulai dari 0, sehingga perlu ditambahkan 1
var year = currentDate.getFullYear();

// Mendapatkan nama hari
var daysOfWeek = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
var dayName = daysOfWeek[currentDate.getDay()];

// Membuat string dengan format yang diinginkan (contoh: Hari, DD-MM-YYYY)
var formattedDate = dayName + ', ' + day + '-' + month + '-' + year;

tanggal.innerHTML = formattedDate;