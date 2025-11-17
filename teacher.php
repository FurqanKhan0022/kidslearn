
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>YouTube Style Cards</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .card-img-top {
      height: 180px;
      object-fit: cover;
    }
    .card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <div class="row g-3">
      <!-- Card 1 -->
      <div class="col-12 col-sm-6 col-md-4">
        <div class="card">
          <img src="./img/imgonline1.jpg" class="card-img-top" alt="Tom and Jerry">
          <div class="card-body">
            <h5 class="card-title">first day in class </h5>
            <p class="card-text">37k views 1 day ago</p>
            <a href="#" class="btn btn-primary btn-sm">Watch Now</a>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-12 col-sm-6 col-md-4">
        <div class="card">
          <img src="./img/imgonline2.jpg" class="card-img-top" alt="CSS Tutorial">
          <div class="card-body">
            <h5 class="card-title">Quiz on online class</h5>
            <p class="card-text">Live now · 1 watching</p>
            <a href="#" class="btn btn-primary btn-sm">Join Live</a>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-12 col-sm-6 col-md-4">
        <div class="card">
          <img src="./img/imgonline3.jpeg" class="card-img-top" alt="Web Dev Roadmap">
          <div class="card-body">
            <h5 class="card-title">Web Dev Roadmap 2025 | SKAMS</h5>
            <p class="card-text">84K views · 5 days ago</p>
            <a href="#" class="btn btn-primary btn-sm">Watch Full Video</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
