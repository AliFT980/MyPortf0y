<?php
$projeler = [
  "gameverse" => [
    "isim" => "GameVerse",
    "aciklama" => "Oyun Haberleri İçin Site",
    "detay" => <<<'EOT'


    GameVerse projesi, oyunculara en güncel haberleri sunmak için tasarlanmış, PHP, HTML ve JavaScript kullanılarak geliştirilmiş modern bir sitedir.



EOT
  ],
 
 
 
 
  "outlast-trials" => [
    "isim" => "MK Denek Arşiv",
    "aciklama" => "Oyunlar için özel site",
    "detay" => <<<'EOT'
    
    
    Outlast Trials için özel olarak hazırladığım bu site, oyun severlere rehberlik eden içerikler ve dinamik tasarım içerir.
  
  
  EOT
  ]







];

$secilen = $_GET['proje'] ?? null;
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Projelerim</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="FıratAzakModernLogo.jpg" type="image/jpg">
  <style>
    body {
      background-color: #101010;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 40px 20px;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    h1 {
      text-align: center;
      color: #00e5ff;
      margin-bottom: 40px;
    }

    .projects-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
      max-width: 1200px;
      margin: auto;
    }

    .card {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid #00e5ff33;
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      backdrop-filter: blur(10px);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 6px 25px rgba(0, 229, 255, 0.3);
    }

    .card h2 {
      color: #00e5ff;
      margin-bottom: 15px;
    }

    .card p {
      color: #ccc;
      margin-bottom: 20px;
    }

    .card .detail-button {
      align-self: flex-start;
      background-color: #00e5ff;
      color: #000;
      padding: 10px 16px;
      border-radius: 8px;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .card .detail-button:hover {
      background-color:rgb(25, 73, 80);
    }

    .detail-box {
      max-width: 700px;
      margin: auto;
      background: #1a1a1a;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 4px 25px rgba(0,0,0,0.6);
    }

    




    .detail-box h2 {
      color: #00e5ff;
      margin-bottom: 20px;
    }

    .detail-box p {
      color: #ddd;
      line-height: 1.6;
    }

    .back-button {
      display: inline-block;
      margin-top: 30px;
      background-color: #00e5ff;
      color: #000;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    /*
     Detaylar Butonundaki Geri Dön Kısmı
*/
    .back-button:hover {
      background-color:rgb(7, 107, 238);
    }


.geri-dönbuton {
  position: absolute;
  top: 20px;
  left: 20px;
  background-color: #00e5ff;
  color: #000;
  padding: 10px 18px;
  border-radius: 8px;
  font-weight: bold;
  box-shadow: 0 4px 12px rgba(0,0,0,0.4);
  transition: background-color 0.3s ease, transform 0.2s ease;
  z-index: 10;
}

.geri-dönbuton:hover {
  background-color:rgb(22, 109, 121);
  transform: scale(1.05);
}






  </style>
</head>
<body>

<?php if ($secilen && isset($projeler[$secilen])): ?>
  <?php $proje = $projeler[$secilen]; ?>
  <div class="detail-box">
    <h2><?= htmlspecialchars($proje['isim']) ?></h2>
    <p><?= htmlspecialchars($proje['detay']) ?></p>
    <a href="projelerlistesi.php" class="back-button">← Projelere Geri Dön</a>
  </div>
<?php else: ?>
  <h1>Projelerim</h1>
  <a href="alifirat.html" class="geri-dönbuton">← Geri Dön</a>
  <div class="projects-container">
    <?php foreach ($projeler as $slug => $proje): ?>
      <div class="card">
        <h2><?= htmlspecialchars($proje['isim']) ?></h2>
        <p><?= htmlspecialchars($proje['aciklama']) ?></p>
        <a href="?proje=<?= urlencode($slug) ?>" class="detail-button">Detaylar</a>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

</body>
</html>

