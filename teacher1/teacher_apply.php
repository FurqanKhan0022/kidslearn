<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Teacher Apply Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      padding: 20px;
    }
    .container {
      max-width: 700px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    input, select, textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      background-color: #007BFF;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    @media(max-width: 600px) {
      .container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Teacher Job Application</h2>
    <form action="submit_application.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="fullname" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="tel" name="phone" placeholder="Phone Number" required />
      <input type="date" name="dob" required />
      <input type="text" name="qualification" placeholder="Qualification" required />
      <input type="number" name="experience" placeholder="Experience (years)" required />
      <select name="subject" required>
        <option value="">Select Subject</option>
        <option>Mathematics</option>
        <option>Physics</option>
        <option>Chemistry</option>
        <option>Biology</option>
        <option>English</option>
        <option>Computer Science</option>
      </select>
      <textarea name="address" rows="3" placeholder="Address" required></textarea>
      <input type="file" name="cv" accept=".pdf,.doc,.docx" required />
      <button type="submit">Submit Application</button>
    </form>
  </div>
</body>
</html>
