<!-- Save as index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Video Upload with Delete Feature</title>
  <style>
    /* [Same CSS from your original post] */
    body {
      font-family: Arial, sans-serif;
      max-width: 700px;
      margin: auto;
      padding: 20px;
    }
    h2 { text-align: center; }
    form {
      background: #f0f0f0;
      padding: 20px;
      border-radius: 8px;
    }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input[type="text"], textarea {
      width: 100%; padding: 8px;
      margin-top: 4px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    input[type="file"] { margin-top: 8px; }
    button {
      margin-top: 15px;
      padding: 12px 20px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover { background: #0056b3; }
    .video-list {
      margin-top: 30px;
      display: grid;
      grid-template-columns: repeat(auto-fill,minmax(300px,1fr));
      gap: 20px;
    }
    .video-card {
      background: white;
      border-radius: 8px;
      padding: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      position: relative;
    }
    .video-card video {
      width: 100%;
      border-radius: 6px;
    }
    .video-card h4 {
      margin: 10px 0 6px;
    }
    .delete-btn {
      background: #dc3545;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }
    .popup {
      display: none;
      position: fixed;
      left:0; top:0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      z-index: 1000;
    }
    .popup-content {
      background: white;
      max-width: 300px;
      margin: 20% auto;
      padding: 30px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 0 10px #00000055;
    }
    .popup-content button {
      margin-top: 15px;
      padding: 10px 20px;
      background: #28a745;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 4px;
      font-size: 16px;
    }
  </style>
</head>
<body>

<h2>Upload Video</h2>

<form id="uploadForm" enctype="multipart/form-data">
  <label for="videoTitle">Title</label>
  <input type="text" id="videoTitle" name="videoTitle" required />
  <label for="videoDescription">Description</label>
  <textarea id="videoDescription" name="videoDescription" rows="3" required></textarea>
  <label for="videoFile">Select Video</label>
  <input type="file" id="videoFile" name="videoFile" accept="video/*" required />
  <button type="submit">Upload</button>
</form>

<div class="video-list" id="videoList"></div>

<!-- Popup -->
<div id="popup" class="popup">
  <div class="popup-content">
    <h3>Upload Successful!</h3>
    <button id="closePopup">Close</button>
  </div>
</div>

<script>
const form = document.getElementById('uploadForm');
const popup = document.getElementById('popup');
const closePopupBtn = document.getElementById('closePopup');
const videoList = document.getElementById('videoList');

form.addEventListener('submit', function(e) {
  e.preventDefault();

  let formData = new FormData(form);

  fetch('upload.php', {
    method: 'POST',
    body: formData,
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      showPopup();
      addVideoCard(data.video);
      form.reset();
    } else {
      alert('Error: ' + data.message);
    }
  })
  .catch(() => {
    alert('Error submitting form.');
  });
});

function showPopup() {
  popup.style.display = 'block';
}

closePopupBtn.addEventListener('click', () => {
  popup.style.display = 'none';
});
window.addEventListener('click', e => {
  if (e.target === popup) popup.style.display = 'none';
});

function addVideoCard(video) {
  const card = document.createElement('div');
  card.className = 'video-card';
  card.setAttribute('data-file', video.file);

  card.innerHTML = `
    <video controls src="uploads/${video.file}"></video>
    <h4>${video.title}</h4>
    <p>${video.description}</p>
    <button class="delete-btn">Delete</button>
  `;

  card.querySelector('.delete-btn').addEventListener('click', () => {
    if (confirm('Are you sure you want to delete this video?')) {
      deleteVideo(video.file, card);
    }
  });

  videoList.prepend(card);
}

function deleteVideo(filename, cardElement) {
  fetch('delete.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ file: filename })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      cardElement.remove();
    } else {
      alert('Delete failed: ' + data.message);
    }
  })
  .catch(() => {
    alert('Error deleting video.');
  });
}

// Load existing videos
window.onload = function() {
  fetch('uploads/videos.json')
    .then(res => res.json())
    .then(videos => {
      videos.reverse().forEach(v => addVideoCard(v));
    })
    .catch(() => {
      // Ignore if videos.json is missing
    });
};
</script>
</body>
</html>
