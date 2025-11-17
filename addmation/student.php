<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Admission Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      padding: 20px;
    }
    .form-box {
      background: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    .btn-submit {
      background-color: #28a745;
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="form-box">
          <h2>Student Admission Form</h2>
          <form id="studentForm">
            <div class="mb-3">
              <label for="fullName" class="form-label">Full Name</label>
              <input type="text" class="form-control" name="fullName" id="fullName" required>
            </div>

            <div class="mb-3">
              <label for="dob" class="form-label">Date of Birth</label>
              <input type="date" class="form-control" name="dob" id="dob" required>
            </div>

            <div class="mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-select" name="gender" id="gender" required>
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="class" class="form-label">Class Applying For</label>
              <input type="text" class="form-control" name="class" id="class" required>
            </div>

            <div class="mb-3">
              <label for="fatherName" class="form-label">Father's Name</label>
              <input type="text" class="form-control" name="fatherName" id="fatherName" required>
            </div>

            <div class="mb-3">
              <label for="motherName" class="form-label">Mother's Name</label>
              <input type="text" class="form-control" name="motherName" id="motherName" required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-submit w-100">Submit Admission</button>
          </form>

          <p id="response" class="mt-3 text-center fw-bold"></p>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("studentForm").addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(this);
      fetch("submit_student.php", {
        method: "POST",
        body: formData,
      })
      .then(res => res.json())
      .then(data => {
        document.getElementById("response").textContent = data.message;
        if (data.success) this.reset();
      });
    });
  </script>
</body>
</html>
