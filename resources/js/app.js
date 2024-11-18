import "./bootstrap";
import "flowbite";

function hitungUmur() {
    const tahunLahir = 2004;
    const bulanLahir = 10 - 1; 
    const hariLahir = 16;
    
    const today = new Date();
    let umur = today.getFullYear() - tahunLahir;

    if (
        today.getMonth() < bulanLahir ||
        (today.getMonth() === bulanLahir && today.getDate() < hariLahir)
    ) {
        umur--;
    }

    document.getElementById("umur").textContent = umur;
}

function countDownMyBirthday() {
    const today = new Date();
    const bulanLahir = 10 - 1; // Bulan lahir: Oktober
    const hariLahir = 16;

    // Set tahun target ulang tahun
    let targetYear = today.getFullYear();
    if (today.getMonth() > bulanLahir || (today.getMonth() === bulanLahir && today.getDate() > hariLahir)) {
        targetYear += 1; // Jika ulang tahun tahun ini sudah lewat, hitung ke ulang tahun berikutnya
    }

    const birthday = new Date(targetYear, bulanLahir, hariLahir);

    // Hitung selisih waktu
    const diffTime = birthday - today;

    // Konversi selisih waktu menjadi tahun, bulan, hari, jam, menit, dan detik
    const years = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 365));
    const months = Math.floor((diffTime % (1000 * 60 * 60 * 24 * 365)) / (1000 * 60 * 60 * 24 * 30));
    const days = Math.floor((diffTime % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diffTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diffTime % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diffTime % (1000 * 60)) / 1000);

    // Tampilkan hasil di elemen HTML
    document.getElementById("years").textContent = years;
    document.getElementById("months").textContent = months;
    document.getElementById("days").textContent = days;
    document.getElementById("hours").textContent = hours;
    document.getElementById("minutes").textContent = minutes;
    document.getElementById("seconds").textContent = seconds;

    // Tampilkan pesan ulang tahun jika waktunya tiba
    if (diffTime <= 0) {
        document.getElementById("birthday-message").textContent = "Happy Birthday!";
    } else {
        document.getElementById("birthday-message").textContent = "Countdown To Upgrade My Age:";
    }

    // Update countdown setiap detik
    setTimeout(countDownMyBirthday, 1000);
}

hitungUmur();
countDownMyBirthday();
