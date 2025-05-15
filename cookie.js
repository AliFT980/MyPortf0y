// HTML'deki öğeleri seç
const banner = document.getElementById("cookie-banner");
const acceptBtn = document.getElementById("accept-cookie");
const form = document.getElementById("iletisimFormu");
const temizleBtn = document.getElementById("verileri-temizle");

// Sayfa yüklenince çerez kontrolü
window.addEventListener("DOMContentLoaded", () => {
  // Eğer çerez kabul edilmemişse banner'ı göster
  if (localStorage.getItem("cookieAccepted") !== "true") {
    banner.style.display = "flex";
  } else {
    // Eğer kabul edildiyse form verisini yükle
    formVerisiniYukle();

     if (temizleBtn) {
      temizleBtn.style.display = "inline-block"; // ✅ EKLENDİ
    }


  }









});

// Kabul Et butonuna tıklanınca
acceptBtn.addEventListener("click", () => {
  localStorage.setItem("cookieAccepted", "true");
  banner.style.display = "none";
  temizleBtn.style.display = "inline-block";
  formVerisiniYukle(); // Formu hemen doldur


  
});

// Form gönderildiğinde ad ve e-postayı kaydet
form.addEventListener("submit", () => {
  if (localStorage.getItem("cookieAccepted") === "true") {
    const ad = form.querySelector('input[name="ad"]').value;
    const email = form.querySelector('input[name="email"]').value;
    localStorage.setItem("kayitliAd", ad);
    localStorage.setItem("kayitliEmail", email);
  }
});

// Kayıtlı form verisini yükle
function formVerisiniYukle() {
  const ad = localStorage.getItem("kayitliAd");
  const email = localStorage.getItem("kayitliEmail");

  if (ad) form.querySelector('input[name="ad"]').value = ad;
  if (email) form.querySelector('input[name="email"]').value = email;
}

// Temizle butonuna basıldığında
temizleBtn.addEventListener("click", () => {
  localStorage.removeItem("kayitliAd");
  localStorage.removeItem("kayitliEmail");
  localStorage.removeItem("cookieAccepted");

  form.querySelector('input[name="ad"]').value = "";
  form.querySelector('input[name="email"]').value = "";

  banner.style.display = "flex"; // Banner'ı tekrar göster
  alert("Tüm veriler ve çerez onayı silindi.");
  temizleBtn.style.display = "none";
});
