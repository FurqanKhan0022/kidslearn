<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ghost Theme Customization</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    .seller-card img {
      width: 60px;
      border-radius: 50%;
    }
    .features-list {
      list-style: none;
      padding-left: 0;
    }
    .features-list li::before {
      content: '\2713';
      margin-right: 8px;
      color: green;
    }
    .video-thumbnail {
      position: relative;
    }
    .video-thumbnail img {
      width: 100%;
      border-radius: 10px;
    }
    .video-thumbnail .play-btn {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 50px;
      color: white;
      background: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
      padding: 10px 20px;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h2 class="fw-bold">I will customize and develop your ghost themes</h2>

    <div class="d-flex align-items-center my-3 seller-card">
      <img src="img/about-1.jpg" alt="Seller Logo" />
      <div class="ms-3">
        <strong>Enamul Haque</strong> <span class="badge bg-success">SKAMS</span><br />
        <small>Level 2 Seller | 163 reviews | Rating: 4.9</small>
      </div>
    </div>

    <div class="video-thumbnail my-4">
      <img src="img/about-2.jpg" alt="Work Process Preview" class="img-fluid" />
      <div class="play-btn">▶</div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <h4 class="fw-semibold">Ghost customization</h4>
        <p>I will customize and fix bugs of your ghost site</p>
        <ul class="features-list">
          <li>1 page</li>
          <li>Responsive design</li>
          <li>Content upload</li>
          <li>1 plugin/extension</li>
          <li>E-commerce functionality (not included)</li>
          <li>1 product</li>
        </ul>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">PKR 23,762</h5>
            <p class="card-text text-muted">2-day delivery</p>
            <button class="btn btn-success w-100" onclick="">Continue</button>
            <button class="btn btn-outline-secondary w-100 mt-2">Contact me</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
